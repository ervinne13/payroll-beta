<?php

namespace App\Models\HR;

use App\Models\SGModel;

class ShiftBreak extends SGModel {

    protected $table      = "shift_break";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "description", "break_start", "break_end"
    ];

}
