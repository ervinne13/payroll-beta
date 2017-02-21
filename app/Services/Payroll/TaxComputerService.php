<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services\Payroll;

use App\Models\HR\Employee;

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
    public function getEstimatedEmployeeTaxDue(Employee $employee) {
        
        $policyPayrollItems = $employee->policy->policyPayrollItems;
                
        
    }

}
