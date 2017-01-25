<?php

use App\Models\HR\WorkSchedule;
use App\Models\HR\WorkScheduleShift;
use Illuminate\Database\Seeder;

class WorkSchedulesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $workSchedules = [
            ["code" => "STD_Weekdays_M", "description" => "Monday to Friday, morning shift"],
            ["code" => "STD_Weekdays_MD", "description" => "Monday to Friday, mid shift"],
            ["code" => "STD_Weekdays_N", "description" => "Monday to Friday, night shift"],
            ["code" => "STD_Weekdays_N11", "description" => "Monday to Friday, night shift"],
            ["code" => "STD_NoSunday_M", "description" => "Monday to Saturday, morning shift"],
            ["code" => "STD_NoSunday_MD", "description" => "Monday to Saturday, mid shift"],
            ["code" => "STD_NoSunday_N", "description" => "Monday to Saturday, night shift"],
            ["code" => "CUST_VarDayOff", "description" => "Variable Day Off. Set via shift adjustment"]
        ];

        WorkSchedule::insert($workSchedules);

        $shifts = [
            //STD_Weekdays_M
            ["work_schedule_code" => "STD_Weekdays_M", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "STD_Weekdays_M", "shift_code" => "MORNING", "week_day" => 2],
            ["work_schedule_code" => "STD_Weekdays_M", "shift_code" => "MORNING", "week_day" => 3],
            ["work_schedule_code" => "STD_Weekdays_M", "shift_code" => "MORNING", "week_day" => 4],
            ["work_schedule_code" => "STD_Weekdays_M", "shift_code" => "MORNING", "week_day" => 5],
            ["work_schedule_code" => "STD_Weekdays_M", "shift_code" => "MORNING", "week_day" => 6],
            ["work_schedule_code" => "STD_Weekdays_M", "shift_code" => "DO", "week_day" => 7],
            //STD_Weekdays_MD
            ["work_schedule_code" => "STD_Weekdays_MD", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "STD_Weekdays_MD", "shift_code" => "MID", "week_day" => 2],
            ["work_schedule_code" => "STD_Weekdays_MD", "shift_code" => "MID", "week_day" => 3],
            ["work_schedule_code" => "STD_Weekdays_MD", "shift_code" => "MID", "week_day" => 4],
            ["work_schedule_code" => "STD_Weekdays_MD", "shift_code" => "MID", "week_day" => 5],
            ["work_schedule_code" => "STD_Weekdays_MD", "shift_code" => "MID", "week_day" => 6],
            ["work_schedule_code" => "STD_Weekdays_MD", "shift_code" => "DO", "week_day" => 7],
            //STD_Weekdays_N
            ["work_schedule_code" => "STD_Weekdays_N", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "STD_Weekdays_N", "shift_code" => "NIGHT_10", "week_day" => 2],
            ["work_schedule_code" => "STD_Weekdays_N", "shift_code" => "NIGHT_10", "week_day" => 3],
            ["work_schedule_code" => "STD_Weekdays_N", "shift_code" => "NIGHT_10", "week_day" => 4],
            ["work_schedule_code" => "STD_Weekdays_N", "shift_code" => "NIGHT_10", "week_day" => 5],
            ["work_schedule_code" => "STD_Weekdays_N", "shift_code" => "NIGHT_10", "week_day" => 6],
            ["work_schedule_code" => "STD_Weekdays_N", "shift_code" => "DO", "week_day" => 7],
            //STD_Weekdays_N11
            ["work_schedule_code" => "STD_Weekdays_N11", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "STD_Weekdays_N11", "shift_code" => "NIGHT_11", "week_day" => 2],
            ["work_schedule_code" => "STD_Weekdays_N11", "shift_code" => "NIGHT_11", "week_day" => 3],
            ["work_schedule_code" => "STD_Weekdays_N11", "shift_code" => "NIGHT_11", "week_day" => 4],
            ["work_schedule_code" => "STD_Weekdays_N11", "shift_code" => "NIGHT_11", "week_day" => 5],
            ["work_schedule_code" => "STD_Weekdays_N11", "shift_code" => "NIGHT_11", "week_day" => 6],
            ["work_schedule_code" => "STD_Weekdays_N11", "shift_code" => "DO", "week_day" => 7],
            //            
            //STD_NoSunday_M
            ["work_schedule_code" => "STD_NoSunday_M", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "STD_NoSunday_M", "shift_code" => "MORNING", "week_day" => 2],
            ["work_schedule_code" => "STD_NoSunday_M", "shift_code" => "MORNING", "week_day" => 3],
            ["work_schedule_code" => "STD_NoSunday_M", "shift_code" => "MORNING", "week_day" => 4],
            ["work_schedule_code" => "STD_NoSunday_M", "shift_code" => "MORNING", "week_day" => 5],
            ["work_schedule_code" => "STD_NoSunday_M", "shift_code" => "MORNING", "week_day" => 6],
            ["work_schedule_code" => "STD_NoSunday_M", "shift_code" => "MORNING", "week_day" => 7],
            //STD_NoSunday_MD
            ["work_schedule_code" => "STD_NoSunday_MD", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "STD_NoSunday_MD", "shift_code" => "MID", "week_day" => 2],
            ["work_schedule_code" => "STD_NoSunday_MD", "shift_code" => "MID", "week_day" => 3],
            ["work_schedule_code" => "STD_NoSunday_MD", "shift_code" => "MID", "week_day" => 4],
            ["work_schedule_code" => "STD_NoSunday_MD", "shift_code" => "MID", "week_day" => 5],
            ["work_schedule_code" => "STD_NoSunday_MD", "shift_code" => "MID", "week_day" => 6],
            ["work_schedule_code" => "STD_NoSunday_MD", "shift_code" => "MID", "week_day" => 7],
            //STD_NoSunday_N
            ["work_schedule_code" => "STD_NoSunday_N", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "STD_NoSunday_N", "shift_code" => "NIGHT_10", "week_day" => 2],
            ["work_schedule_code" => "STD_NoSunday_N", "shift_code" => "NIGHT_10", "week_day" => 3],
            ["work_schedule_code" => "STD_NoSunday_N", "shift_code" => "NIGHT_10", "week_day" => 4],
            ["work_schedule_code" => "STD_NoSunday_N", "shift_code" => "NIGHT_10", "week_day" => 5],
            ["work_schedule_code" => "STD_NoSunday_N", "shift_code" => "NIGHT_10", "week_day" => 6],
            ["work_schedule_code" => "STD_NoSunday_N", "shift_code" => "NIGHT_10", "week_day" => 7],
            //
            //CUST_VarDayOff
            ["work_schedule_code" => "CUST_VarDayOff", "shift_code" => "MORNING", "week_day" => 1],
            ["work_schedule_code" => "CUST_VarDayOff", "shift_code" => "MORNING", "week_day" => 2],
            ["work_schedule_code" => "CUST_VarDayOff", "shift_code" => "MORNING", "week_day" => 3],
            ["work_schedule_code" => "CUST_VarDayOff", "shift_code" => "MORNING", "week_day" => 4],
            ["work_schedule_code" => "CUST_VarDayOff", "shift_code" => "MORNING", "week_day" => 5],
            ["work_schedule_code" => "CUST_VarDayOff", "shift_code" => "MORNING", "week_day" => 6],
            ["work_schedule_code" => "CUST_VarDayOff", "shift_code" => "MORNING", "week_day" => 7],
        ];

        WorkScheduleShift::insert($shifts);
    }

}
