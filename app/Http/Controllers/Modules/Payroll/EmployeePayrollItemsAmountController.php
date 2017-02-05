<?php

namespace App\Http\Controllers\Modules\Payroll;

use App\Http\Controllers\Controller;
use App\Models\HR\Employee;

class EmployeePayrollItemsAmountController extends Controller {

    public function index($employeeCode) {

        $employee = Employee::find($employeeCode);

        return $employee->policy->payrollItems()->amount($employee->code)->get();
    }

}
