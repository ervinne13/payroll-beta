<?php

use App\Models\Security\User;
use Illuminate\Database\Seeder;

class DefaultUsersSeeder extends Seeder {

    public static $defaultUsers = [
        ["id" => "admin", "role_code" => "ADMIN", "display_name" => "Administrator", "default_location_code" => "HO", "default_company_code" => "poms"],
        ["id" => "payprocessor", "role_code" => "PAY_PROC", "display_name" => "Payroll Processor", "default_location_code" => "HO", "default_company_code" => "poms"],
        ["id" => "user", "role_code" => "USER", "display_name" => "User", "default_location_code" => "HO", "default_company_code" => "poms"],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        self::$defaultUsers = array_map(function($user) {
            $user["password"] = \Hash::make("password");
            return $user;
        }, self::$defaultUsers);

        User::insert(self::$defaultUsers);
    }

}
