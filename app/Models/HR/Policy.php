<?php

namespace App\Models\HR;

use App\Models\SGModel;

class Policy extends SGModel {

    protected $table      = "policy";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "description", "long_description"
    ];

    public function policyPayrollItems() {
        return $this->hasMany(PolicyPayrollItem::class, 'policy_code');
    }

    public function payrollItems() {
        return $this->belongsToMany(PayrollItem::class, "policy_payroll_item", "policy_code", "policy_item_code");
    }

}
