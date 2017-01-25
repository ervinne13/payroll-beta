<?php

use App\Models\HR\PayrollItem;
use Illuminate\Database\Seeder;

class PayrollItemsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // <editor-fold defaultstate="collapsed" desc="Standard Items">

        $stdDeductions = [
            ["code" => "STD_D_BTL", "description" => "Break Time Lates", "computation_basis" => "M"],
            ["code" => "STD_D_LU", "description" => "Lates & Undertimes", "computation_basis" => "M"],
            ["code" => "STD_D_HDA", "description" => "Half Day Absent", "computation_basis" => "M"],
            ["code" => "STD_D_A", "description" => "Absences", "computation_basis" => "D"],
            ["code" => "STD_D_BLates", "description" => "Break Time Lates", "computation_basis" => "M"],
        ];

        for ($i = 0; $i < count($stdDeductions); $i ++) {
            $stdDeductions[$i]["standard"]             = 1;
            $stdDeductions[$i]["taxable"]              = 1;
            $stdDeductions[$i]["type"]                 = "D";
            $stdDeductions[$i]["special_holiday_rate"] = 100;
            $stdDeductions[$i]["regular_holiday_rate"] = 100;
        }

        PayrollItem::insert($stdDeductions);

        $stdTaxableEarnings = [
            // adjusts/negates Lates & Undertimes
            ["code" => "STD_E_TCO", "description" => "Tardiness Converted to Overtime", "computation_basis" => "M"],
            ["code" => "STD_E_DE", "description" => "Daily Income", "computation_basis" => "D"],
        ];

        for ($i = 0; $i < count($stdTaxableEarnings); $i ++) {
            $stdTaxableEarnings[$i]["standard"]             = 1;
            $stdTaxableEarnings[$i]["taxable"]              = 1;
            $stdTaxableEarnings[$i]["type"]                 = "E";
            $stdTaxableEarnings[$i]["special_holiday_rate"] = 100;
            $stdTaxableEarnings[$i]["regular_holiday_rate"] = 100;
        }

        PayrollItem::insert($stdTaxableEarnings);

        $stdUniqueTaxableByTheMinuteEarnings = [
            // adjusts/negates Lates & Undertimes            
            ["code" => "STD_E_WDO", "description" => "Working Day Off", "special_holiday_rate" => 130, "regular_holiday_rate" => 130],
            ["code" => "STD_E_OT", "description" => "Regular Overtime", "special_holiday_rate" => 125, "regular_holiday_rate" => 125],
            ["code" => "STD_E_NDiff", "description" => "Night Differential", "special_holiday_rate" => 138, "regular_holiday_rate" => 138],
            ["code" => "STD_E_SSOT", "description" => "Sunday Special Holiday Overtime", "special_holiday_rate" => 150, "regular_holiday_rate" => 150],
            ["code" => "STD_E_SROT", "description" => "Sunday Regular Holiday Overtime", "special_holiday_rate" => 160, "regular_holiday_rate" => 160]
        ];

        for ($i = 0; $i < count($stdUniqueTaxableByTheMinuteEarnings); $i ++) {
            $stdUniqueTaxableByTheMinuteEarnings[$i]["standard"]          = 1;
            $stdUniqueTaxableByTheMinuteEarnings[$i]["computation_basis"] = "M";
            $stdUniqueTaxableByTheMinuteEarnings[$i]["type"]              = "E";
        }

        PayrollItem::insert($stdUniqueTaxableByTheMinuteEarnings);

        $stdSTDAdjustments = [
            ["code" => "STD_E_IAdj", "description" => "Income Adjustment"],
        ];

        for ($i = 0; $i < count($stdSTDAdjustments); $i ++) {
            $stdSTDAdjustments[$i]["standard"]             = 1;
            $stdSTDAdjustments[$i]["taxable"]              = 0;
            $stdSTDAdjustments[$i]["computation_basis"]    = "A";
            $stdSTDAdjustments[$i]["type"]                 = "E";
            $stdSTDAdjustments[$i]["special_holiday_rate"] = 0;
            $stdSTDAdjustments[$i]["regular_holiday_rate"] = 0;
        }

        PayrollItem::insert($stdSTDAdjustments);

        $stdSTDDeductionAdjustments = [
            ["code" => "STD_D_DAdj", "description" => "Deduction Adjustment"],
        ];

        for ($i = 0; $i < count($stdSTDDeductionAdjustments); $i ++) {
            $stdSTDDeductionAdjustments[$i]["standard"]             = 1;
            $stdSTDDeductionAdjustments[$i]["taxable"]              = 0;
            $stdSTDDeductionAdjustments[$i]["computation_basis"]    = "A";
            $stdSTDDeductionAdjustments[$i]["type"]                 = "D";
            $stdSTDDeductionAdjustments[$i]["special_holiday_rate"] = 0;
            $stdSTDDeductionAdjustments[$i]["regular_holiday_rate"] = 0;
        }

        PayrollItem::insert($stdSTDDeductionAdjustments);

        // </editor-fold>


        $others = [
            ["code" => "E_Incentive", "description" => "Incentives", "taxable" => 1, "type" => "E"],
            ["code" => "D_PrevAbsence", "description" => "Previous Absence Deduction", "taxable" => 0, "type" => "D"]
        ];

        for ($i = 0; $i < count($others); $i ++) {
            $others[$i]["standard"]             = 0;
            $others[$i]["computation_basis"]    = "A";
            $others[$i]["special_holiday_rate"] = 0;
            $others[$i]["regular_holiday_rate"] = 0;
        }

        PayrollItem::insert($others);
    }

}
