<?php

use App\Models\Position;
use App\Models\PositionLevel;
use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $positionLevels = [
            ["code" => "DOCU", "description" => "Doumentation", "level" => 1000],
            ["code" => "LIA", "description" => "Liason", "level" => 2000],
            ["code" => "REC", "description" => "Recruitment", "level" => 3000],
            ["code" => "DIR", "description" => "Directoral", "level" => 4000],
            ["code" => "EXEC", "description" => "Executive", "level" => 5000],
        ];

        PositionLevel::insert($positionLevels);

        $executives = [
            ["code" => 5001, "name" => "President", "position_level_code" => "EXEC"],
            ["code" => 5002, "name" => "Vice President", "position_level_code" => "EXEC"],
        ];

        Position::insert($executives);

        $directors = [
            ["code" => 4001, "name" => "Operation Manager", "position_level_code" => "DIR"],
            ["code" => 4002, "name" => "Asst. Operation Manager", "position_level_code" => "DIR"],
            ["code" => 4003, "name" => "ADMIN/HR Officer", "position_level_code" => "DIR"],
            ["code" => 4004, "name" => "Asst. Admin/HR Officer", "position_level_code" => "DIR"],
            ["code" => 4005, "name" => "Business Devt. Officer", "position_level_code" => "DIR"],
        ];

        Position::insert($directors);

        $managers = [
            ["code" => 3001, "name" => "Recruitment Manager", "position_level_code" => "REC", "parent_code" => NULL],
            ["code" => 3002, "name" => "Recruitment Supervisor", "position_level_code" => "REC", "parent_code" => NULL],
            ["code" => 3003, "name" => "Recruitment Officer", "position_level_code" => "REC", "parent_code" => NULL],
            ["code" => 3004, "name" => "Recruitment Assistant", "position_level_code" => "REC", "parent_code" => NULL],
        ];

        Position::insert($managers);

        $supervisors = [
            ["code" => 2001, "name" => "Liason Officer", "position_level_code" => "LIA", "parent_code" => NULL],
            ["code" => 2002, "name" => "Liason Assistant", "position_level_code" => "LIA", "parent_code" => NULL],
        ];

        Position::insert($supervisors);

        $rankAndFiles = [
            ["code" => 1001, "name" => "Documentation Officer", "position_level_code" => "DOCU", "parent_code" => NULL],
            ["code" => 1002, "name" => "Documentation Assistant", "position_level_code" => "DOCU", "parent_code" => NULL],
        ];

        Position::insert($rankAndFiles);
    }

}
