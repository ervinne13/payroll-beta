<?php

namespace App\Models\HR;

use App\Models\HR\PolicyPayrollItem;
use App\Models\Payroll\PayrollItem;
use App\Models\SGModel;

class Policy extends SGModel {

    protected $table      = "policy";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "description", "long_description"
    ];
    protected $payrollItemCodes = [];

    public function hasPayrollItem($payrollItemCode) {
        if (count($this->payrollItemCodes) == 0) {
            $this->payrollItemCodes = array_column($this->policyPayrollItems->toArray(), "payroll_item_code");
        }

        return in_array($payrollItemCode, $this->payrollItemCodes);
    }

    public function policyPayrollItems() {
        return $this->hasMany(PolicyPayrollItem::class, 'policy_code');
    }

    public function payrollItems() {
        return $this->belongsToMany(PayrollItem::class, "policy_payroll_item", "policy_code", "payroll_item_code");
    }

}
