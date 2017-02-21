<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Model;

class EmployeePayrollItemComputation extends Model {

    public $incrementing  = false;
    protected $table      = "employee_payroll_item_computation";
    protected $primaryKey = ["employee_code", "payroll_item_code"];
    protected $fillable   = ["employee_code", "payroll_item_code", "amount"];

}
