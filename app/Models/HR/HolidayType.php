<?php

namespace App\Models\HR;

use App\Models\SGModel;

class HolidayType extends SGModel {

    protected $table      = "holiday_type";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "description", "compensation_multiplier"
    ];

}
