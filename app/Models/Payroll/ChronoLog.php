<?php

namespace App\Models\Payroll;

use App\Models\SGModel;

class ChronoLog extends SGModel {

    protected $table      = "chrono_log";
    protected $primaryKey = ["employee_code", "entry_date"];

    public function scopeBetweenDates($query, $from, $to) {
        return $query
                        ->whereDate("entry_date", '>=', $from)
                        ->whereDate("entry_date", '<=', $to)
                        ->orderBy("entry_time");
    }

}
