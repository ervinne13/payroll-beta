<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $companies = [
            ["code" => "POMS", "name" => "Profile Overseas Manpower Services Inc."]
        ];

        Company::insert($companies);
    }

}
