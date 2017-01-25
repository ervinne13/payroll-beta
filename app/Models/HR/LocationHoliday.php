<?php

namespace App\Models\HR;

use App\Models\SGModel;

class LocationHoliday extends SGModel {

    protected $table      = "location_has_holiday";
    protected $primaryKey = ["location_code", "location_company_code", "holiday_code"];
    protected $fillable   = [
        "location_code", "location_company_code", "holiday_code"
    ];

}
