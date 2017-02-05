<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services\Payroll;

use App\Models\Payroll\PayrollItem;
use App\Services\Payroll\Exceptions\PayrollItemProcessorNotFoundException;

/**
 * Description of PayrollItemProcessorLookupService
 *
 * @author ervinne
 */
class PayrollItemProcessorLookupService {

    /**
     * 
     * @param PayrollItem $payrollItem
     * @returns Processors\PayrollItemProcessor;
     */
    public function lookup(PayrollItem $payrollItem) {
        if (array_key_exists($payrollItem->code, static::$processorMap)) {
            return static::$processorMap[$payrollItem->code];
        } else {
            throw new PayrollItemProcessorNotFoundException($payrollItem);
        }
    }

    protected static $processorMap = [
        //  earnings
        "STD_E_MI" => "\Earnings\MonthlyIncomePayrollItemProcessor",
        //  deductions
        "STD_D_A"  => "\Deductions\AbsencesPayrollItemProcessor"
    ];

}
