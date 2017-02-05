<?php

use App\Models\HR\Employee;
use App\Models\HR\Policy;
use App\Models\HR\TaxCategory;
use App\Models\Location;
use App\Models\Position;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $generatedEmployees = [];

        $code = 20170120000;

        for ($i = 0; $i < 50; $i++) {
            $faker = Factory::create();

            $position    = $faker->randomElement(Position::all()->toArray());
            $location    = $faker->randomElement(Location::all()->toArray());
            $taxCategory = $faker->randomElement(TaxCategory::all()->toArray());
//            $policy      = $faker->randomElement(Policy::all()->toArray());
            $policy      = [
                "code" => "MR" //monthly regular
            ];

            $code++;

            $employeeData = [
                "code"              => $code,
                "first_name"        => $faker->firstName,
                "middle_name"       => $faker->lastName,
                "last_name"         => $faker->lastName,
                "email"             => $faker->email,
                "address"           => $faker->address,
                "birth_date"        => $faker->dateTimeBetween('-30 years'),
                "gender_code"       => $faker->randomElement([0, 1]),
                "civil_status_code" => $faker->randomElement([0, 1]),
                "contact_number_1"  => $faker->phoneNumber,
                "contact_number_2"  => $faker->phoneNumber,
                "date_hired"        => $faker->dateTimeBetween('-10 years'),
                //  foreign keys
                "position_code"     => $position["code"],
                "location_code"     => $location["code"],
                "company_code"      => $location["company_code"],
                "tax_category_code" => $taxCategory["code"],
                "policy_code"       => $policy["code"],
            ];

            array_push($generatedEmployees, $employeeData);
        }

        Employee::insert($generatedEmployees);
    }

}
