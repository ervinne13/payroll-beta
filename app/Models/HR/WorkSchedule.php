<?php

namespace App\Models\HR;

use App\Models\SGModel;

class WorkSchedule extends SGModel {

    protected $table      = "work_schedule";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "description"
    ];

    public function workScheduleShifts() {
        return $this->hasMany(WorkScheduleShift::class, "work_schedule_code");
    }

}
