<?php

use App\Models\Payroll\ChronoLog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * php artisan db:seed --class=SampleChronoLogSeeder
 */
class SampleChronoLogSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table("chrono_log")->truncate();

        $chronoLogTemplate = [
            "employee_code"         => "20170120003",
            "location_code"         => "HO",
            "location_company_code" => "POMS",
        ];

        $januaryDays = [26, 30, 31];

        //  Absent: feb 8
        $febuaryDays = [
            1, 2, 3,
            6, 7, 8, 9, 10,
        ];

        foreach ($januaryDays AS $day) {
            $log = $chronoLogTemplate;

            //  Between 7:30 and 8:30
            $timeIn = date('H:i:s', rand(7.5 * 60 * 60, 8.5 * 60 * 60));

            $log["entry_date"] = "2017-01-{$day}";
            $log["entry_time"] = "2017-01-{$day} {$timeIn}";
            $log["entry_type"] = "IN";

            ChronoLog::insert($log);

            //  Exactly 5:00 PM
            $timeOut = date('H:i:s', 17 * 60 * 60);

            $log["entry_date"] = "2017-01-{$day}";
            $log["entry_time"] = "2017-01-{$day} {$timeOut}";
            $log["entry_type"] = "OUT";

            ChronoLog::insert($log);
        }

        foreach ($febuaryDays AS $day) {
            $log = $chronoLogTemplate;

            //  Between 7:30 and 8:30
            $timeIn = date('H:i:s', rand(7.5 * 60 * 60, 8.5 * 60 * 60));

            $log["entry_date"] = "2017-02-{$day}";
            $log["entry_time"] = "2017-02-{$day} {$timeIn}";
            $log["entry_type"] = "IN";

            ChronoLog::insert($log);

            //  Exactly 5:00 PM
            $timeOut = date('H:i:s', 17 * 60 * 60);

            $log["entry_date"] = "2017-02-{$day}";
            $log["entry_time"] = "2017-02-{$day} {$timeOut}";
            $log["entry_type"] = "OUT";

            ChronoLog::insert($log);
        }
    }

}
