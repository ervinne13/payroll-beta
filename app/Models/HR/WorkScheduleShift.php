<?php

namespace App\Models\HR;

use App\Models\SGModel;

class WorkScheduleShift extends SGModel {

    protected $table      = "work_schedule_has_shift";
    protected $primaryKey = ["work_schedule_code", "shift_code", "week_day"];
    protected $fillable   = ["work_schedule_code", "shift_code", "week_day"];

    public function shift() {
        return $this->belongsTo(Shift::class, "shift_code");
    }

}
