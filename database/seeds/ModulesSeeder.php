<?php

use App\Models\Module;
use App\Models\ModuleGroup;
use Illuminate\Database\Seeder;

class ModulesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        /**         * ***************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Module Groups">

        $moduleGroups = [
            ["code" => "security", "description" => "Security", "relative_url" => "security"],
            ["code" => "master_file", "description" => "Master Files", "relative_url" => "master-files"],
            ["code" => "payroll", "description" => "Payroll", "relative_url" => "payroll"],
            ["code" => "time_keeping", "description" => "Time Keeping", "relative_url" => "time-keeping"]
        ];

        ModuleGroup::insert($moduleGroups);

        // </editor-fold>        

        /**         * ***************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Security Modules">

        $securityModules = [
            ["code" => "sec_user", "description" => "Users", "relative_url" => "users"],
        ];

        for ($i = 0; $i < count($securityModules); $i ++) {
            $securityModules[$i]["module_group_code"]  = "security";
            $securityModules[$i]["with_number_series"] = false;
        }

        Module::insert($securityModules);

        // </editor-fold>

        /**         * ***************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Master File Modules">

        $masterFileModules = [
            //  Main
            ["code" => "mf_company", "description" => "Company", "relative_url" => "companies"],
            ["code" => "mf_deparmtent", "description" => "Department", "relative_url" => "departments"],
            ["code" => "mf_position", "description" => "Position", "relative_url" => "positions"],
            ["code" => "mf_location", "description" => "Location", "relative_url" => "locations"],
            //  HR
            ["code" => "mf_holiday", "description" => "Holiday", "relative_url" => "holidays"],
            ["code" => "mf_tax_category", "description" => "Tax Category", "relative_url" => "tax-categories"],
            ["code" => "mf_shift", "description" => "Shift", "relative_url" => "shifts"],
            ["code" => "mf_leave_type", "description" => "Leave Type", "relative_url" => "leave-types"],
            ["code" => "mf_loan_type", "description" => "Loan Type", "relative_url" => "loans-types"],
            //  Payroll
            ["code" => "mf_payroll_item_type", "description" => "Payroll Item Type", "relative_url" => "payroll-item-types"],
            //  Computation Tables
            ["code" => "mf_tax_table", "description" => "Tax Table", "relative_url" => "tax-table"],
            ["code" => "mf_sss_table", "description" => "SSS Table", "relative_url" => "sss-table"],
            ["code" => "mf_philhealth_table", "description" => "Philhealth Table", "relative_url" => "philhealth-table"]
        ];

        for ($i = 0; $i < count($masterFileModules); $i ++) {
            $masterFileModules[$i]["module_group_code"]  = "payroll";
            $masterFileModules[$i]["with_number_series"] = false;
        }

        Module::insert($masterFileModules);

        // </editor-fold>

        /**         * ***************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Payroll Modules">

        $payrollModules = [
            ["code" => "pay_process", "description" => "Payroll Process", "relative_url" => "process"],
            ["code" => "pay_entry", "description" => "Payroll Entries", "relative_url" => "entries"],
        ];

        for ($i = 0; $i < count($payrollModules); $i ++) {
            $payrollModules[$i]["module_group_code"]  = "payroll";
            $payrollModules[$i]["with_number_series"] = true;
        }

        Module::insert($payrollModules);

        // </editor-fold>

        /**         * ***************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Timekeeping Modules">

        $timekeepingModules = [
            ["code" => "tk_entry", "description" => "Employee Time Entries", "relative_url" => "entries"],
            ["code" => "tk_import_export", "description" => "Import / Export Time Entries", "relative_url" => "import-export"],
        ];

        for ($i = 0; $i < count($timekeepingModules); $i ++) {
            $timekeepingModules[$i]["module_group_code"]  = "time_keeping";
            $timekeepingModules[$i]["with_number_series"] = true;
        }

        Module::insert($timekeepingModules);

        // </editor-fold>
    }

}
