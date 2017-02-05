<?php

namespace App\Models\HR;

use App\Models\SGModel;
use DateTime;

class WorkSchedule extends SGModel {

    protected $table      = "work_schedule";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "description"
    ];

    public function scopeAppliesToEmployeeBeforeDate($query, Employee $employee, DateTime $lastDateApplicable) {
        return $query
                        ->rightJoin("employee_work_schedule", "work_schedule_code", "=", "work_schedule.code")
                        ->where("employee_code", $employee->code)
                        ->whereDate("effective_date", '<=', $lastDateApplicable)
        ;
    }

    public function scopeAppliesToEmployeeAtInterval($query, Employee $employee, $dateFrom, $dateTo) {
        return $query
                        ->rightJoin("employee_work_schedule", "work_schedule_code", "=", "work_schedule.code")
                        ->where("employee_code", $employee->code)
                        ->whereDate("effective_date", '>=', $dateFrom)
                        ->whereDate("effective_date", '<=', $dateTo)
        ;
    }

    public function workScheduleShifts() {
        return $this->hasMany(WorkScheduleShift::class, "work_schedule_code")->orderBy('week_day');
    }

}
