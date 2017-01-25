<?php

use App\Models\Security\Role;
use Illuminate\Database\Seeder;

class DefaultRolesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        /**         * ***************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Creating Roles">

        $roles = [
            ["code" => "ADMIN", "name" => "Administrator"],
            ["code" => "PAY_PROC", "name" => "Payroll Processor"],
            ["code" => "USER", "name" => "User"],
        ];

        Role::insert($roles);

        // </editor-fold>

        /**         * ***************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Administrator Access List">
        // </editor-fold>
    }

}
