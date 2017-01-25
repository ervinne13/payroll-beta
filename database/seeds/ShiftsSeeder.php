<?php

use App\Models\HR\Shift;
use App\Models\HR\ShiftBreak;
use Illuminate\Database\Seeder;

class ShiftsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $shifts = [
            ["code" => "DO", "description" => "Day Off", "scheduled_in" => "00:00", "scheduled_out" => "00:00"],
            ["code" => "MORNING", "description" => "Morning Shift", "scheduled_in" => "8:00", "scheduled_out" => "17:00"],
            ["code" => "MID", "description" => "Mid Shift", "scheduled_in" => "14:00", "scheduled_out" => "22:00"],
            ["code" => "NIGHT_10", "description" => "Night Shift 10", "scheduled_in" => "22:00", "scheduled_out" => "6:00"],
            ["code" => "NIGHT_11", "description" => "Night Shift 11", "scheduled_in" => "23:00", "scheduled_out" => "7:00"]
        ];

        Shift::insert($shifts);

        $breaks = [
            ["code" => "MB", "description" => "Morning Break", "break_start" => "9:00", "break_end" => "9:15"],
            ["code" => "LB", "description" => "Lunch Break", "break_start" => "12:00", "break_end" => "13:00"],
            ["code" => "ABS", "description" => "(Short) Afternoon Break", "break_start" => "15:00", "break_end" => "15:15"],
            ["code" => "ABL", "description" => "(Long) Afternoon Break", "break_start" => "18:00", "break_end" => "19:00"],
            ["code" => "EB", "description" => "Evening Break", "break_start" => "2:00", "break_end" => "3:00"],
        ];

        ShiftBreak::insert($breaks);
    }

}
