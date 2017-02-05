<?php

use App\Models\HR\Policy;
use App\Models\HR\PolicyPayrollItem;
use Illuminate\Database\Seeder;

class PoliciesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $policies = [
            ["code" => "MR", "short_description" => "Monthly Regular, Morning Shift"],
            ["code" => "MRF", "short_description" => "Monthly Regular, Morning Shift, Flexi"],
            ["code" => "WR", "short_description" => "Weekly Regular, Morning Shift"],
            ["code" => "DR", "short_description" => "Daily Regular, Morning Shift"],
            ["code" => "MC", "short_description" => "Monthly Contractual, Morning Shift"],
            ["code" => "CON", "short_description" => "Consultant", "long_description" => "We'll use consultants to demonstrate hourly compensation"],
        ];

        for ($i = 0; $i < count($policies); $i ++) {
            if (!array_key_exists("long_description", $policies[$i])) {
                $policies[$i]["long_description"] = '
                <h4>Monthly Regulary Employee Policies</h4>

                <p>This is a sample only <strong>DO NOT USE IN PRODUCTION</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>

                <ol>
                   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                   <li>Aliquam tincidunt mauris eu risus.</li>
                </ol>

                <blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote>';
            }
        }

        Policy::insert($policies);

        //  monthly regular

        $MRPayroll = [
            //  Earnings
            ["payroll_item_code" => "STD_E_MI"], //  monthly income
            ["payroll_item_code" => "STD_E_OT"], //  OT
            ["payroll_item_code" => "STD_E_NDiff"], //  Night Diff
            //
            //  Deductions
            ["payroll_item_code" => "STD_D_A"], // absences
            ["payroll_item_code" => "STD_D_LU"], // lates
            ["payroll_item_code" => "STD_D_BTL"], // break lates
            ["payroll_item_code" => "STD_D_HDA"], // half day
            //
            //  Benefits
            ["payroll_item_code" => "STD_D_SSS"],
            ["payroll_item_code" => "STD_D_PAGIBIG"],
            ["payroll_item_code" => "STD_D_PH"],
        ];

        for ($i = 0; $i < count($MRPayroll); $i ++) {
            $MRPayroll[$i]["policy_code"] = "MR";
        }

        PolicyPayrollItem::insert($MRPayroll);

        $MRFPayroll = $MRPayroll;
        array_push($MRFPayroll, ["payroll_item_code" => "STD_E_TCO"]);


        for ($i = 0; $i < count($MRFPayroll); $i ++) {
            $MRFPayroll[$i]["policy_code"] = "MRF";
        }

        PolicyPayrollItem::insert($MRFPayroll);

        //  Consultant

        $CONPayroll = [
            //  Earnings
            ["payroll_item_code" => "STD_E_DI"], //  daily income
        ];

        for ($i = 0; $i < count($CONPayroll); $i ++) {
            $CONPayroll[$i]["policy_code"] = "CON";
        }

        PolicyPayrollItem::insert($CONPayroll);
    }

}
