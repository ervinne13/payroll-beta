<?php

namespace App\Models\Payroll;

use App\Models\SGModel;
use Illuminate\Support\Facades\DB;

class ChronoLog extends SGModel {

    protected $table      = "chrono_log";
    protected $primaryKey = ["employee_code", "entry_date"];

    public function scopeBetweenDates($query, $from, $to) {
        return $query
                        ->whereDate("entry_date", '>=', $from)
                        ->whereDate("entry_date", '<=', $to)
                        ->orderBy("entry_time");
    }

    public function scopeDatatable($query) {
        return $query
                        ->select([
                            "entry_date",
                            DB::raw("GROUP_CONCAT(if(entry_type = 'IN', entry_time, NULL)) AS time_in"),
                            DB::raw("GROUP_CONCAT(if(entry_type = 'OUT', entry_time, NULL)) AS time_out"),
                        ])
                        ->groupBy("entry_date")
        ;
    }

    public static function table($employeeCode) {
        $queryString = "SELECT 
                            entry_date,
                            GROUP_CONCAT(if(entry_type = 'IN', entry_time, NULL)) AS time_in,
                            GROUP_CONCAT(if(entry_type = 'OUT', entry_time, NULL)) AS time_out
                        FROM chrono_log
                        WHERE employee_code = '{$employeeCode}'
                        GROUP BY entry_date; ";

        return DB::query($queryString);
    }

}
