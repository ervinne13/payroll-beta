<?php

namespace App\Models\HR;

use App\Models\SGModel;

class PolicyPayrollItem extends SGModel {

    protected $table      = "policy_payroll_item";
    protected $primaryKey = ["policy_code", "payroll_item_code"];
    protected $fillable   = [
        "policy_code", "payroll_item_code", "overrides_payroll_item"
    ];

}
