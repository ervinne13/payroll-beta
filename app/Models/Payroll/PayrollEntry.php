<?php

namespace App\Models\Payroll;

use App\Models\SGModel;

class PayrollEntry extends SGModel {

    protected $table      = "payroll_entry";
    protected $primaryKey = ["employee_code", "payroll_item_code", "date_applied"];
    protected $fillable   = [
        "employee_code", "payroll_item_code", "date_applied", "qty", "amount", "remarks"
    ];

}
