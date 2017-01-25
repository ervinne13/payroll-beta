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
            ["code" => "RF", "description" => "Rank & File", "level" => 1000],
            ["code" => "SUP", "description" => "Supervisory", "level" => 2000],
            ["code" => "MGR", "description" => "Managerial", "level" => 3000],
            ["code" => "DIR", "description" => "Directoral", "level" => 4000],
            ["code" => "EXEC", "description" => "Executive", "level" => 5000],
        ];

        PositionLevel::insert($positionLevels);

        $executives = [
            ["code" => 5001, "name" => "General Manager", "position_level_code" => "EXEC"],
            ["code" => 5002, "name" => "President", "position_level_code" => "EXEC"],
        ];

        Position::insert($executives);

        $directors = [
            ["code" => 4001, "name" => "PLD Director", "position_level_code" => "DIR"],
            ["code" => 4002, "name" => "OPS Director", "position_level_code" => "DIR"],
            ["code" => 4003, "name" => "Exec Director for Finance", "position_level_code" => "DIR"],
            ["code" => 4004, "name" => "Exec Director for Ops", "position_level_code" => "DIR"],
            ["code" => 4005, "name" => "Exec Director for Marketing", "position_level_code" => "DIR"],
            ["code" => 4006, "name" => "Exec Director for Accounting", "position_level_code" => "DIR"],
        ];

        Position::insert($directors);

        $managers = [
            ["code" => 3001, "name" => "Area Manager", "position_level_code" => "MGR", "parent_code" => NULL],
            ["code" => 3002, "name" => "Marketing Manager", "position_level_code" => "MGR", "parent_code" => NULL],
            ["code" => 3003, "name" => "Tresury Manager", "position_level_code" => "MGR", "parent_code" => NULL],
            ["code" => 3004, "name" => "MIS Manager", "position_level_code" => "MGR", "parent_code" => NULL],
            ["code" => 3005, "name" => "HR Manager", "position_level_code" => "MGR", "parent_code" => NULL],
            ["code" => 3006, "name" => "PLD Manager", "position_level_code" => "MGR", "parent_code" => 4001],
            ["code" => 3007, "name" => "Head Accountant", "position_level_code" => "MGR", "parent_code" => 4006],
        ];

        Position::insert($managers);

        $supervisors = [
            ["code" => 2001, "name" => "Branch Officer", "position_level_code" => "SUP", "parent_code" => NULL],
            ["code" => 2002, "name" => "Branch Head", "position_level_code" => "SUP", "parent_code" => NULL],
            ["code" => 2003, "name" => "Purchasing Supervisor", "position_level_code" => "SUP", "parent_code" => NULL],
            ["code" => 2004, "name" => "Creative Supervisor", "position_level_code" => "SUP", "parent_code" => NULL],
            ["code" => 2005, "name" => "Marketing Supervisor", "position_level_code" => "SUP", "parent_code" => NULL],
            ["code" => 2006, "name" => "Tresury Supervisor", "position_level_code" => "SUP", "parent_code" => NULL],
            ["code" => 2007, "name" => "Warehouse Supervisor", "position_level_code" => "SUP", "parent_code" => NULL],
            ["code" => 2008, "name" => "HR Supervisor", "position_level_code" => "SUP", "parent_code" => NULL],
            ["code" => 2009, "name" => "Area Tech", "position_level_code" => "SUP", "parent_code" => NULL],
            //
            ["code" => 2011, "name" => "Supervisor Accountant 2", "position_level_code" => "SUP", "parent_code" => NULL],
            //
            ["code" => 2010, "name" => "Supervisor Accountant 1", "position_level_code" => "SUP", "parent_code" => 2010],
        ];

        Position::insert($supervisors);

        $rankAndFiles = [
            ["code" => 1001, "name" => "Branch Janitor/Utility", "position_level_code" => "DIR", "parent_code" => 2002],
            ["code" => 1002, "name" => "Branch Messenger", "position_level_code" => "DIR", "parent_code" => 2002],
            ["code" => 1003, "name" => "Branch Driver", "position_level_code" => "DIR", "parent_code" => 2002],
            ["code" => 1004, "name" => "Buyer", "position_level_code" => "DIR", "parent_code" => 2003],
            ["code" => 1005, "name" => "Branch Staff", "position_level_code" => "DIR", "parent_code" => 2001],
            ["code" => 1006, "name" => "Warehouse Staff", "position_level_code" => "DIR", "parent_code" => 2007],
            ["code" => 1007, "name" => "Purchasing Staff", "position_level_code" => "DIR", "parent_code" => 2003],
            ["code" => 1008, "name" => "Importation Specialist", "position_level_code" => "DIR", "parent_code" => 2003],
            ["code" => 1009, "name" => "Payroll Specialist", "position_level_code" => "DIR", "parent_code" => NULL],
            ["code" => 1010, "name" => "Machine Specialist", "position_level_code" => "DIR", "parent_code" => 3004],
            ["code" => 1011, "name" => "Marketing Staff", "position_level_code" => "DIR", "parent_code" => 2005],
            ["code" => 1012, "name" => "HR Staff", "position_level_code" => "DIR", "parent_code" => 2008],
            ["code" => 1013, "name" => "Payroll Staff", "position_level_code" => "DIR", "parent_code" => 2010],
            ["code" => 1014, "name" => "Accounting Staff", "position_level_code" => "DIR", "parent_code" => 2010],
        ];

        Position::insert($rankAndFiles);
    }

}
