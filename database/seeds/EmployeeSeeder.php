<?php

use App\Models\HR\Employee;
use App\Models\HR\EmployeeWorkSchedule;
use App\Models\HR\TaxCategory;
use App\Models\Location;
use App\Models\Payroll\EmployeePayrollItemComputation;
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

        $employeeNames = [
            ["first_name" => "Put first name here", "last_name" => "put last name here"],
            ["first_name" => "Put first name 2nd employee here", "last_name" => "put last name 2nd employee  here"],
                //  and so on
                //  dito nio type
        ];

        $generatedEmployees              = [];
        $employeeWorkSchedules           = [];
        $employeePayrollItemComputations = [];

        $code = 20170120000;

        for ($i = 0; $i < count($employeeNames); $i++) {
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
                "first_name"        => $employeeNames[i]["first_name"],
                "middle_name"       => $employeeNames[i]["last_name"],
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
//                "salary"            => 20000
            ];

            array_push($generatedEmployees, $employeeData);

            array_push($employeeWorkSchedules, [
                "employee_code"      => $code,
                "effective_date"     => "2017-01-01",
                "work_schedule_code" => "STD_Weekdays_M",
            ]);

            array_push($employeePayrollItemComputations, [
                "employee_code"     => $code,
                "payroll_item_code" => "STD_E_MI",
                "amount"            => 20000
            ]);

            array_push($employeePayrollItemComputations, [
                "employee_code"     => $code,
                "payroll_item_code" => "STD_D_SSS",
                "amount"            => 500
            ]);

            array_push($employeePayrollItemComputations, [
                "employee_code"     => $code,
                "payroll_item_code" => "STD_D_PAGIBIG",
                "amount"            => 100
            ]);

            array_push($employeePayrollItemComputations, [
                "employee_code"     => $code,
                "payroll_item_code" => "STD_D_PH",
                "amount"            => 312.50
            ]);
        }

        Employee::insert($generatedEmployees);
        EmployeeWorkSchedule::insert($employeeWorkSchedules);
        EmployeePayrollItemComputation::insert($employeePayrollItemComputations);
    }

}
