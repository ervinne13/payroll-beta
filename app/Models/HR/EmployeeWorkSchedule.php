<?php

namespace App\Models\HR;

use App\Models\SGModel;

class EmployeeWorkSchedule extends SGModel {

    protected $table      = "employee_work_schedule";
    protected $primaryKey = ["employee_id", "work_schedule_code"];
    protected $fillable   = [
        "employee_id", "work_schedule_code", "effective_date"
    ];

}
