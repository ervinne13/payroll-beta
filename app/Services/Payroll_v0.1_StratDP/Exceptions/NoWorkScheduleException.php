<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services\Payroll\Exceptions;

use App\Models\HR\Employee;
use Exception;

/**
 * Description of NoWorkScheduleException
 *
 * @author ervinne
 */
class NoWorkScheduleException extends Exception {

    public function __construct(Employee $employee, $message = "", $code = 0, $previous = null) {
        if ($message == "") {
            parent::__construct("Work schedule not assigned to employee {$employee->first_name} {$employee->last_name}.", $code, $previous);
        } else {
            parent::__construct($message, $code, $previous);
        }
    }

}
