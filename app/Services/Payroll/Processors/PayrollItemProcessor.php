<?php

namespace App\Services\Payroll\Processors;

use App\Models\HR\Employee;
use App\Models\Payroll\PayrollItem;

/**
 *
 * @author ervinne
 */
interface PayrollItemProcessor {

    /**
     * 
     * @param Employee $employee
     * @param arra $workingDayComputation     
     * @param PayrollItem $payrollItem
     * @return Description\App\Models\Payroll\PayrollEntry
     */
    public function generatePayrollEntry(
    Employee $employee, $workingDayComputation, PayrollItem $payrollItem
    );
}
