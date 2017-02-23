<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services\Payroll;

use App\Models\HR\Employee;
use App\Models\Payroll\Payroll;
use App\Models\Payroll\TaxComputation;

/**
 * Description of TaxComputerService
 *
 * @author ervinne
 */
class TaxComputerService {

    /**
     * Tax computer service estimates the employee tax due by getting all payroll
     * items that are either exact amount, or 
     * @param Employee $employee
     */
    public function getEstimatedEmployeeTaxDue(Employee $employee, Payroll $payroll) {

        $payrollEntries = $payroll
                ->payrollEntries()
                ->where("employee_code", $employee->code)
                ->where("payroll_item_code", "!=", "STD_D_WHT")
                ->with('payrollItem')
                ->get();

        $taxableEarnings = 0;

        foreach ($payrollEntries AS $payrollEntry) {
            if (!$payrollEntry->payrollItem->taxable) {
                continue;
            }

            if ($payrollEntry->payrollItem->type == "E") {
                $taxableEarnings += $payrollEntry->amount;
            } else {
                $taxableEarnings -= $payrollEntry->amount;
            }
        }

        return $this->getTaxAmount($employee, $taxableEarnings);
    }

    //  NOT COMPLETE! Should include other taxable incomes
    private function getTaxAmount(Employee $employee, $income) {

        //  estimate tax
        $annualIncome   = $income * 12;
        $taxComputation = TaxComputation::where("over_amount", ">=", $annualIncome)->where("below_amount", "<=", $annualIncome)->first();
        $excemption     = $employee->taxCategory->exemption_amount;

        if ($taxComputation) {
            return( ($taxComputation->tax_due + (($annualIncome - $taxComputation->over_amount) * $taxComputation->percent / 100)) - $excemption) / 12;
        } else {
            return 0;
        }
    }

}
