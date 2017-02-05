<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services\Payroll\Processors\Earnings;

use App\Models\HR\Employee;
use App\Models\Payroll\PayrollItem;
use App\Services\Payroll\Processors\PayrollItemProcessor;

/**
 * Description of StandardEarningsPayrollItemProcessor
 *
 * @author ervinne
 */
class StandardEarningsPayrollItemProcessor implements PayrollItemProcessor {

    public function generatePayrollEntry(Employee $employee, $workingDayComputation, PayrollItem $payrollItem) {
        
    }

}
