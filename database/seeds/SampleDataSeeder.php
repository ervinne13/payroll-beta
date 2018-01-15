<?php

use App\Models\HR\Holiday;
use App\Models\Payroll\ChronoLog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleDataSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table("holiday")->truncate();
        DB::table("chrono_log")->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->seedHolidays();
        $this->seedJesusChronolog();
        $this->seedPiaChronolog();
    }

    public function seedHolidays()
    {

        $xmasEve                    = new Holiday();
        $xmasEve->code              = "12_24_XMASEVE";
        $xmasEve->description       = "Christmas Eve";
        $xmasEve->holiday_type_code = "SNW";
        $xmasEve->date_start        = DateTime::createFromFormat('Y-m-d', "2017-12-24");
        $xmasEve->date_end          = DateTime::createFromFormat('Y-m-d', "2017-12-24");

        $xmasEve->save();

        $xmas                    = new Holiday();
        $xmas->code              = "12_25_XMAS";
        $xmas->description       = "Christmas Day";
        $xmas->holiday_type_code = "REG";
        $xmas->date_start        = DateTime::createFromFormat('Y-m-d', "2017-12-25");
        $xmas->date_end          = DateTime::createFromFormat('Y-m-d', "2017-12-25");

        $xmas->save();

        $rizal                    = new Holiday();
        $rizal->code              = "12_30_RIZAL";
        $rizal->description       = "Rizal Day";
        $rizal->holiday_type_code = "REG";
        $rizal->date_start        = DateTime::createFromFormat('Y-m-d', "2017-12-30");
        $rizal->date_end          = DateTime::createFromFormat('Y-m-d', "2017-12-30");

        $rizal->save();

        $holiday                    = new Holiday();
        $holiday->code              = "12_31_LDY";
        $holiday->description       = "Last Day of the Year";
        $holiday->holiday_type_code = "REG";
        $holiday->date_start        = DateTime::createFromFormat('Y-m-d', "2017-12-31");
        $holiday->date_end          = DateTime::createFromFormat('Y-m-d', "2017-12-31");

        $holiday->save();

        $newYear                    = new Holiday();
        $newYear->code              = "01_01_NY";
        $newYear->description       = "New Year";
        $newYear->holiday_type_code = "SNW";
        $newYear->date_start        = DateTime::createFromFormat('Y-m-d', "2018-01-30");
        $newYear->date_end          = DateTime::createFromFormat('Y-m-d', "2018-01-31");

        $newYear->save();
    }

    public function seedJesusChronolog()
    {
        $jesusLogTemplate = [
            "employee_code"         => "20170120001",
            "location_code"         => "HO",
            "location_company_code" => "POMS",
        ];

        $jesusTimeLog = [
            ['2017-12-11', '8:00:00', '5:00:00'],
            ['2017-12-12', '8:00:00', '5:00:00'],
            ['2017-12-13', '8:00:00', '5:00:00'],
            ['2017-12-14', '8:00:00', '5:00:00'],
            ['2017-12-15', '8:00:00', '5:00:00'],
            
            ['2017-12-18', '8:00:00', '5:00:00'],
            ['2017-12-19', '8:00:00', '5:00:00'],
            ['2017-12-20', '8:00:00', '5:00:00'],
            ['2017-12-21', '8:00:00', '5:00:00'],
            ['2017-12-22', '8:00:00', '5:00:00'],
        ];

        foreach ( $jesusTimeLog as $log ) {
            $logEntry = $jesusLogTemplate;

            $logEntry["entry_date"] = $log[0];
            $logEntry["entry_time"] = "{$log[0]} {$log[1]}";
            $logEntry["entry_type"] = "IN";

            ChronoLog::insert($logEntry);

            $logEntry["entry_date"] = $log[0];
            $logEntry["entry_time"] = "{$log[0]} {$log[2]}";
            $logEntry["entry_type"] = "OUT";

            ChronoLog::insert($logEntry);
        }
    }

    public function seedPiaChronolog()
    {
        $piaLogTemplate = [
            "employee_code"         => "20170120049",
            "location_code"         => "HO",
            "location_company_code" => "POMS",
        ];

        $piaTimeLog = [
            ['2017-12-11', '8:00:00', '5:00:00'],
            ['2017-12-12', '8:00:00', '5:00:00'],
            ['2017-12-13', '8:00:00', '5:00:00'],
            ['2017-12-14', '8:00:00', '5:00:00'],
            ['2017-12-15', '8:00:00', '5:00:00'],
            
            ['2017-12-18', '8:00:00', '5:00:00'],
            ['2017-12-19', '8:00:00', '5:00:00'],
            ['2017-12-20', '8:00:00', '5:00:00'],
            ['2017-12-21', '8:00:00', '5:00:00'],            
        ];

        foreach ( $piaTimeLog as $log ) {
            $logEntry = $piaLogTemplate;

            $logEntry["entry_date"] = $log[0];
            $logEntry["entry_time"] = "{$log[0]} {$log[1]}";
            $logEntry["entry_type"] = "IN";

            ChronoLog::insert($logEntry);

            $logEntry["entry_date"] = $log[0];
            $logEntry["entry_time"] = "{$log[0]} {$log[2]}";
            $logEntry["entry_type"] = "OUT";

            ChronoLog::insert($logEntry);
        }
    }

}
