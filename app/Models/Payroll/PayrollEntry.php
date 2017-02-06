<?php

namespace App\Models\Payroll;

use App\Models\SGModel;

class PayrollEntry extends SGModel {

    protected $table      = "payroll_entry";
    protected $primaryKey = ["employee_code", "payroll_item_code", "date_applied"];
    protected $fillable   = [
        "employee_code", "payroll_item_code", "date_applied", "qty", "amount", "remarks"
    ];

    public function scopeEmployee($query, $employeeCode) {
        return $query->where("employee_code", $employeeCode);
    }

    public function scopePayrollPeriod($query, $pay_period) {
        return $query->where("payroll_pay_period", $pay_period);
    }

    public function payrollItem() {
        return $this->belongsTo(PayrollItem::class, "payroll_item_code");
    }

}
