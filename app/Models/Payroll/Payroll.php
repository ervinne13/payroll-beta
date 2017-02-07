<?php

namespace App\Models\Payroll;

use App\Models\SGModel;

class Payroll extends SGModel {

    protected $table      = "payroll";
    protected $primaryKey = "pay_period";
    protected $fillable   = [
        "pay_period", "cutoff_start", "cutoff_end", "next_pay_period", "include_monthly_processable",
        "approved_by", "prepared_by", "received_by"
    ];

    public function payrollEntries() {
        return $this->hasMany(PayrollEntry::class, "payroll_pay_period");
    }

}
