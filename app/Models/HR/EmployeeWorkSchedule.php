<?php

namespace App\Models\HR;

use App\Models\SGModel;

class EmployeeWorkSchedule extends SGModel {

    protected $table      = "employee_work_schedule";
    protected $primaryKey = ["employee_code", "work_schedule_code", "effective_date"];
    protected $fillable   = [
        "employee_id", "work_schedule_code", "effective_date", "locked"
    ];

    public function workSchedule() {
        return $this->belongsTo(WorkSchedule::class, 'work_schedule_code');
    }

}
