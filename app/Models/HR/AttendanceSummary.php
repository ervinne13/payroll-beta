<?php

namespace App\Models\HR;

use App\Models\Payroll\Payroll;
use App\Models\SGModel;

class AttendanceSummary extends SGModel {

    protected $table      = "attendance_summary";
    protected $primaryKey = ["employee_code", "payroll_pay_period"];
    public $workingDays   = [];

    public function __construct(array $attributes = array()) {

        $this->month_days   = 0;
        $this->working_days = 0;

        $this->present                  = 0;
        $this->absent                   = 0;
        $this->halfday_absent           = 0;
        $this->late                     = 0;
        $this->breaktime_late           = 0;
        $this->overtime                 = 0;
        $this->rest_day_overtime        = 0;
        $this->holiday_overtime         = 0;
        $this->special_holiday_overtime = 0;

        parent::__construct($attributes);
    }

    public function scopeOf($query, $employeeCode, $payPeriod) {
        return $query->where("employee_code", $employeeCode)->where("payroll_pay_period", $payPeriod);
    }

    public function payroll() {
        return $this->belongsTo(Payroll::class, "payroll_pay_period");
    }

    public function employee() {
        return $this->belongsTo(Employee::class, "employee_code");
    }

}
