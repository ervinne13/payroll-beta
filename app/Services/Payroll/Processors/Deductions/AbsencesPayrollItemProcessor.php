<?php

namespace App\Services\Payroll\Processors\Deductions;

use App\Models\HR\Employee;
use App\Models\HR\WorkSchedule;
use App\Models\Payroll\Payroll;
use App\Models\Payroll\PayrollEntry;
use App\Models\Payroll\PayrollItem;
use App\Services\Payroll\Processors\PayrollItemProcessor;
use App\Services\Payroll\WorkingDayComputationService;
use DateTime;

/**
 * Description of AbsencesPayrollItemProcessor
 *
 * @author ervinne
 */
class AbsencesPayrollItemProcessor implements PayrollItemProcessor {

    protected $lastApplicableWorkScheduleIndex = 0;
    protected $employeeWorkSchedules           = [];

    public function generatePayrollEntry(Employee $employee, $workingDayComputation, PayrollItem $payrollItem) {
        $entry = new PayrollEntry();

        $entry->employee_code     = $employee->code;
        $entry->payroll_item_code = $payrollItem->code;
        $entry->date_applied      = new DateTime();

        $entry->qty    = $workingDayComputation["absences"];
        $entry->amount = $employee->detailedSalary["daily"];

        return $entry;
    }

}
