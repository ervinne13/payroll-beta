<?php

namespace App\Services\Payroll\Processors\Earnings;

use App\Models\HR\Employee;
use App\Models\Payroll\PayrollEntry;
use App\Models\Payroll\PayrollItem;
use App\Services\Payroll\Processors\PayrollItemProcessor;
use DateTime;

/**
 * Description of MonthlyIncomePayrollItemProcessor
 *
 * @author ervinne
 */
class MonthlyIncomePayrollItemProcessor implements PayrollItemProcessor {

    /**
     * For monthly income, we don't care about deductions, absences and lates will handle that
     * @param Employee $employee
     * @param PayrollItem $payrollItem
     */
    public function generatePayrollEntry(Employee $employee, $workingDayComputation, PayrollItem $payrollItem) {

        $entry = new PayrollEntry();

        $entry->employee_code     = $employee->code;
        $entry->payroll_item_code = $payrollItem->code;
        $entry->date_applied      = new DateTime();

        $entry->qty = 1;

        $monthDays  = $workingDayComputation["workingMonthDayCount"];
        $cutoffDays = $workingDayComputation["workingCutoffDayCount"];

        $entry->amount = $employee->salary * $cutoffDays / $monthDays;

        return $entry;
    }

}
