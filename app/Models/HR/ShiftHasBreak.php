<?php

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Model;

class ShiftHasBreak extends Model {

    protected $table      = "shift_has_break";
    protected $primaryKey = ["shift_break_code", "shift_code"];

}
