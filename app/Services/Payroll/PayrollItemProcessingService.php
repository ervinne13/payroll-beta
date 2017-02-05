<?php

namespace App\Services\Payroll;

use App\Models\HR\Employee;
use App\Models\Payroll\Payroll;
use App\Models\Payroll\PayrollEntry;
use App\Services\Payroll\Exceptions\NoWorkScheduleException;
use App\Services\Payroll\Exceptions\PayrollItemProcessorNotFoundException;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Description of PayrollItemProcessingService
 *
 * @author ervinne
 */
class PayrollItemProcessingService {

    /** @var PayrollItemProcessorLookupService */
    protected $lookupService;

    /** @var WorkingDayComputationService */
    protected $workingDayComputationService;

    public function __construct(PayrollItemProcessorLookupService $lookupService, WorkingDayComputationService $workingDayComputationService) {
        $this->lookupService                = $lookupService;
        $this->workingDayComputationService = $workingDayComputationService;
    }

    public function processPayrollItems(Employee $employee, Payroll $payroll) {
        try {
            $generatedPayrollEntries = [];
            DB::beginTransaction();

            //  clear payroll entries of the employee
            PayrollEntry::where("employee_code", $employee->code)->delete();

            $policy                = $employee->policy;
            $workingDayComputation = $this->workingDayComputationService->getWorkingDays($payroll, $employee);

            //  get daily salary of employee
            $employee->detailedSalary = $this->getEmployeeDetailedSalary($employee, $policy, $workingDayComputation);

            foreach ($policy->payrollItems AS $payrollItem) {
                try {
                    //  get the proper processor for this payroll item
                    $processorClassName = "App\\Services\\Payroll\\Processors" . $this->lookupService->lookup($payrollItem);
                    $processor          = new $processorClassName;

                    $payrollEntry                     = $processor->generatePayrollEntry($employee, $workingDayComputation, $payrollItem);
                    $payrollEntry->payroll_pay_period = $payroll->pay_period;

                    $payrollEntry->save();

                    array_push($generatedPayrollEntries, $payrollEntry);
                } catch (PayrollItemProcessorNotFoundException $e) {
                    //  ignore for testing
//                    echo $e->getMessage() . "</br>";                
                } catch (\Exception $e) {
                    echo $e->getMessage() . "</br>";
                };
            }

            DB::commit();

            return $generatedPayrollEntries;
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }

    private function getEmployeeDetailedSalary(Employee $employee, $policy, $workingDayComputation) {

        $salaryItems = [
            "STD_E_HI",
            "STD_E_DI",
            "STD_E_WI",
            "STD_E_MI",
        ];

        $salaryItemMultipliers = [
            "STD_E_HI" => 8,
            "STD_E_DI" => 1,
            "STD_E_WI" => 2 / $workingDayComputation["workingCutoffDayCount"],
            "STD_E_MI" => 1 / $workingDayComputation["workingMonthDayCount"],
        ];

        $salaryItem = null;

        foreach ($policy->payrollItems AS $payrollItem) {
            if (in_array($payrollItem->code, $salaryItems)) {
                $salaryItem = $payrollItem;
                break;
            }
        }

        if ($salaryItem) {
            $salaryDetails           = [];
            $salaryDetails["daily"]  = $salaryItemMultipliers[$salaryItem->code] * $employee->salary;
            $salaryDetails["hourly"] = $salaryDetails["daily"] / 8;
            $salaryDetails["minute"] = $salaryDetails["hourly"] / 60;

            return $salaryDetails;
        } else {
            throw new Exception("Employee {$employee->first_name} {$employee->last_name} does not have a salary set up. Please review his/her policy.");
        }
    }

}
