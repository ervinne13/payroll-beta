<?php

namespace App\Models\Payroll;

class Payroll extends \App\Models\SGModel {

    protected $table      = "payroll";
    protected $primaryKey = "pay_period";
    protected $fillable = [
        "pay_period", "cutoff_start", "cutoff_end", "next_pay_period", "include_monthly_processable"
    ];
    
    

}
