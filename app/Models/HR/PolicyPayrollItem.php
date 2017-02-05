<?php

namespace App\Models\HR;

use App\Models\Payroll\PayrollItem;
use App\Models\SGModel;

class PolicyPayrollItem extends SGModel {

    protected $table      = "policy_payroll_item";
    protected $primaryKey = ["policy_code", "payroll_item_code"];
    protected $fillable   = [
        "policy_code", "payroll_item_code", "overrides_payroll_item"
    ];

    public function payrollItem() {
        return $this->belongsTo(PayrollItem::class, "payroll_item_code");
    }

    public function overridesPayrollItem() {
        return $this->belongsTo(PayrollItem::class, "overrides_payroll_item");
    }

}
