<?php

namespace App\Models\HR;

use App\Models\SGModel;

class Shift extends SGModel {

    protected $table      = "shift";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "description", "scheduled_in", "scheduled_out"
    ];

    public function breaks() {
        return $this->belongsToMany(ShiftBreak::class, "shift_has_break", "shift_code", "shift_break_code");
    }

}
