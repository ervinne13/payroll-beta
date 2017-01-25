<?php

namespace App\Models\HR;

use App\Models\SGModel;

class Holiday extends SGModel {

    protected $table      = "holiday";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "is_active", "holiday_type_code", "description", "date_start", "date_end"
    ];

    public function type() {
        return $this->belongsTo(HolidayType::class, 'holiday_type_code');
    }

}
