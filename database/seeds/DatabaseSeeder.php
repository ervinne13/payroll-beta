<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        try {

            DB::beginTransaction();

            //  reset first
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table("company")->truncate();
            DB::table("location")->truncate();

            DB::table("role")->truncate();
            DB::table("user")->truncate();

            DB::table("module")->truncate();
            DB::table("module_access")->truncate();
            DB::table("module_group")->truncate();

            DB::table("tax_category")->truncate();
            DB::table("tax_computation")->truncate();

            DB::table("work_schedule_has_shift")->truncate();
            DB::table("employee_work_schedule")->truncate();
            DB::table("work_schedule")->truncate();

            DB::table("shift_has_break")->truncate();
            DB::table("shift_break")->truncate();
            DB::table("shift_adjustment")->truncate();
            DB::table("shift")->truncate();

            DB::table("payroll_entry")->truncate();
            DB::table("payroll_item")->truncate();

            DB::table("policy_payroll_item")->truncate();
            DB::table("policy")->truncate();

            DB::table("position")->truncate();
            DB::table("position_level")->truncate();                                   

            DB::table("employee")->truncate();

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $this->call(CompaniesSeeder::class);
            $this->call(LocationsSeeder::class);
            $this->call(DefaultRolesSeeder::class);
            $this->call(DefaultUsersSeeder::class);

            $this->call(ModulesSeeder::class);
            $this->call(DefaultUserAccessSeeder::class);

            $this->call(TaxCategoriesSeeder::class);
            $this->call(TaxComputationSeeder::class);

            $this->call(ShiftsSeeder::class);
            $this->call(WorkSchedulesSeeder::class);

            $this->call(PayrollItemsSeeder::class);
            $this->call(PoliciesSeeder::class);

            $this->call(PositionsSeeder::class);

            $this->call(EmployeeSeeder::class);

            $this->call(SampleDataSeeder::class);
            
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
