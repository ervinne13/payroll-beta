<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services\Payroll\Exceptions;

use App\Models\Payroll\PayrollItem;
use Exception;

/**
 * Description of PayrollItemProcessorNotFoundException
 *
 * @author ervinne
 */
class PayrollItemProcessorNotFoundException extends Exception {

    public function __construct(PayrollItem $payrollItem, $message = "", $code = 0, $previous = null) {
        if ($message == "") {
            parent::__construct("Processor for payroll item {$payrollItem->description} ({$payrollItem->code}) not found.", $code, $previous);
        } else {
            parent::__construct($message, $code, $previous);
        }
        
    }

}
