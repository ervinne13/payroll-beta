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
            ["first_name" => "Jesus Noel", "last_name" => "Litan"],
			["first_name" => "Rodelina", "last_name" => "De Villa"],
			["first_name" => "Levy", "last_name" => "Quindo"],
			["first_name" => "Emmanuel", "last_name" => "Jimenez"],
			["first_name" => "Ruby Anne", "last_name" => "Jacob"],
			["first_name" => "Marilyn", "last_name" => "Palmero"],
			["first_name" => "Mardiosa", "last_name" => "Yanez"],
			["first_name" => "Venice", "last_name" => "Malabanan"],
			["first_name" => "Ramil", "last_name" => "Noceda"],
			["first_name" => "Rolando", "last_name" => "Sobero"],
			["first_name" => "Anthony", "last_name" => "De Leon"],
			["first_name" => "Valerie Joy", "last_name" => "Santos"],
			["first_name" => "Ziel", "last_name" => "Espinosa"],
			["first_name" => "Omar", "last_name" => "Dacuya"],
			["first_name" => "Roseanne", "last_name" => "Flores"],
			["first_name" => "Jin", "last_name" => "Hojilla"],
			["first_name" => "Marife", "last_name" => "Seguera"],
			["first_name" => "Grace", "last_name" => "Garcia"],
			["first_name" => "Hazel", "last_name" => "Cervantes"],
			["first_name" => "Christian", "last_name" => "Manalo"],
			["first_name" => "Grace", "last_name" => "Garcia"],
			["first_name" => "John Rolan", "last_name" => "Manaoag"],
			["first_name" => "Veraldine", "last_name" => "Camilio"],
			["first_name" => "Maria Ivana", "last_name" => "Alcaraz"],
            ["first_name" => "Charmaine", "last_name" => "Eneres"],
			["first_name" => "Karen Mae", "last_name" => "Magtibay"],
			["first_name" => "Arnel", "last_name" => "Matreo"],
			["first_name" => "Joana", "last_name" => "Cacnio"],
			["first_name" => "Leocelle", "last_name" => "Cupido"],
			["first_name" => "Merlita", "last_name" => "Ramos"],
			["first_name" => "Cecille", "last_name" => "Balmaceda"],
			["first_name" => "Mila", "last_name" => "Lopez"],
			["first_name" => "Rodolfo", "last_name" => "Pecson"],
			["first_name" => "Patrick", "last_name" => "Palaganas"],
			["first_name" => "Liezel", "last_name" => "Leveriza"],
			["first_name" => "Yolanda", "last_name" => "Valdez"],
			["first_name" => "Cherry", "last_name" => "De Guzman"],
			["first_name" => "Sarah", "last_name" => "Eranino"],
			["first_name" => "Dave", "last_name" => "Udiongan"],
			["first_name" => "Christian John", "last_name" => "Encela"],
			["first_name" => "Renie", "last_name" => "Angki"],
			["first_name" => "Johny", "last_name" => "Santos"],
			["first_name" => "Angel", "last_name" => "Fuente"],
			["first_name" => "Jenny", "last_name" => "Morante"],
			["first_name" => "Enielbert", "last_name" => "Estefanio"],
			["first_name" => "Leah", "last_name" => "Orcilla"],
			["first_name" => "Albert", "last_name" => "Topacio"],
			["first_name" => "Brian", "last_name" => "Santiago"],
			["first_name" => "Al Pia", "last_name" => "Goda"],
			["first_name" => "Mutya", "last_name" => "Sy"],
			["first_name" => "Sharmaine", "last_name" => "Recto"],
			["first_name" => "Joana", "last_name" => "Mendez"],
        ];

        $generatedEmployees              = [];
        $employeeWorkSchedules           = [];
        $employeePayrollItemComputations = [];

        $code = 20170120000;

		for ($i = 0; $i < count($employeeNames); $i++) {
        //for ($i = 0; $i < 10; $i++) {
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
//                "first_name"        => $employeeNames[$i]["first_name"],
                "first_name"        => $faker->firstName,
                "middle_name"       => "",
                "last_name"         => $faker->lastName,
//                "last_name"         => $employeeNames[$i]["last_name"],
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
