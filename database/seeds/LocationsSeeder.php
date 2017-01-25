<?php

use App\Models\Company;
use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {        

        $locations = [            
            ["code" => "HO", "company_code" => "POMS", "description" => "Head Office"]
        ];

        Location::insert($locations);
    }

}
