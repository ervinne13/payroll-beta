<?php

namespace App\Models\Payroll;

use App\Models\SGModel;
use DateTime;

class ChronoLog extends SGModel {

    protected $table      = "chrono_log";
    protected $primaryKey = ["employee_code", "entry_date"];

    public function scopeBetweenDates($query, DateTime $from, DateTime $to) {
        return $query
                        ->whereDate("entry_date", '>=', $from->format('Y-m-d'))
                        ->whereDate("entry_date", '<=', $to->format('Y-m-d'))
                        ->orderBy("entry_time");
    }

}
