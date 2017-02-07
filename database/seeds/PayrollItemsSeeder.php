<?php

use App\Models\Payroll\PayrollItem;

;

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
            ["code" => "STD_D_LU", "payslip_display_string" => "Tardiness", "description" => "Lates & Undertimes", "computation_basis" => "MIN", "requires_employee_amount" => 0],
            ["code" => "STD_D_BTL", "payslip_display_string" => "Tardiness", "description" => "Break Time Lates", "computation_basis" => "MIN", "requires_employee_amount" => 0],
            ["code" => "STD_D_HDA", "payslip_display_string" => "Tardiness", "description" => "Half Day Absent", "computation_basis" => "MIN", "requires_employee_amount" => 0],
            ["code" => "STD_D_A", "payslip_display_string" => "Absent", "description" => "Absences", "computation_basis" => "DAY", "requires_employee_amount" => 0],
            //  Benefits
            ["code" => "STD_D_SSS", "payslip_display_string" => "SSS", "description" => "SSS Deductions", "computation_basis" => "EA", "requires_employee_amount" => 1],
            ["code" => "STD_D_PAGIBIG", "payslip_display_string" => "HDMF", "description" => "PAGIBIG Deductions", "computation_basis" => "EA", "requires_employee_amount" => 1],
            ["code" => "STD_D_PH", "payslip_display_string" => "Philhealth", "description" => "Philhealth Deductions", "computation_basis" => "EA", "requires_employee_amount" => 1],
        ];

        for ($i = 0; $i < count($stdDeductions); $i ++) {
            $stdDeductions[$i]["standard"]   = 1;
            $stdDeductions[$i]["taxable"]    = 1;
            $stdDeductions[$i]["type"]       = "D";
            $stdDeductions[$i]["multiplier"] = 1;
            $stdDeductions[$i]["divider"]    = 1;

            if ($stdDeductions[$i]["code"] == "STD_D_HDA") {
                $stdDeductions[$i]["multiplier"] = 4;
            }
        }

        PayrollItem::insert($stdDeductions);

        $stdTaxableEarnings = [
            ["code" => "STD_E_HI", "payslip_display_string" => "Salary", "description" => "Hourly Income", "computation_basis" => "HR", "requires_employee_amount" => 1],
            ["code" => "STD_E_DI", "payslip_display_string" => "Salary", "description" => "Daily Income", "computation_basis" => "DAY", "requires_employee_amount" => 1],
//            ["code" => "STD_E_WI", "description" => "Weekly Income", "computation_basis" => "W", "requires_employee_amount" => 1],
            ["code" => "STD_E_MI", "payslip_display_string" => "Salary", "description" => "Monthly Income", "computation_basis" => "MON", "requires_employee_amount" => 1],
            // adjusts/negates Lates & Undertimes
            ["code" => "STD_E_TCO", "payslip_display_string" => "Tardiness", "description" => "Tardiness Converted to Overtime", "computation_basis" => "MIN", "requires_employee_amount" => 0],
            ["code" => "STD_E_GP", "payslip_display_string" => "Tardiness", "description" => "Grace Period", "computation_basis" => "MIN", "requires_employee_amount" => 1],
//            ["code" => "STD_E_BTGP", "description" => "Break Time Grace Period", "computation_basis" => "MIN", "requires_employee_amount" => 0],
            //  allowances
            ["code" => "STD_E_TA", "payslip_display_string" => "Taxable Allowance", "description" => "Taxable Allowance", "computation_basis" => "EA", "requires_employee_amount" => 1],
            ["code" => "STD_E_NTA", "payslip_display_string" => "Allowance", "payslip_display_string" => "Tardiness", "description" => "Non Taxable Allowance", "computation_basis" => "EA", "requires_employee_amount" => 1],
            ["code" => "STD_E_COLA", "payslip_display_string" => "COLA", "description" => "Cost of Living Allowance", "computation_basis" => "EA", "requires_employee_amount" => 1],
        ];

        for ($i = 0; $i < count($stdTaxableEarnings); $i ++) {
            $stdTaxableEarnings[$i]["standard"]   = 1;
            $stdTaxableEarnings[$i]["taxable"]    = 1;
            $stdTaxableEarnings[$i]["type"]       = "E";
            $stdTaxableEarnings[$i]["multiplier"] = 1;
            $stdTaxableEarnings[$i]["divider"]    = 1;

            if ($stdTaxableEarnings[$i]["code"] == "STD_E_NTA" || $stdTaxableEarnings[$i]["code"] == "STD_E_COLA") {
                $stdTaxableEarnings[$i]["taxable"] = 0;
            }
        }

        PayrollItem::insert($stdTaxableEarnings);

        $stdUniqueTaxableByTheMinuteEarnings = [
            // adjusts/negates Lates & Undertimes                        
            ["code" => "STD_E_NDiff", "payslip_display_string" => "Overtime", "description" => "Night Differential", "multiplier" => 1.38],
            ["code" => "STD_E_OT", "payslip_display_string" => "Overtime", "description" => "Regular Overtime", "multiplier" => 1.25],
        ];

        for ($i = 0; $i < count($stdUniqueTaxableByTheMinuteEarnings); $i ++) {
            $stdUniqueTaxableByTheMinuteEarnings[$i]["standard"]                 = 1;
            $stdUniqueTaxableByTheMinuteEarnings[$i]["computation_basis"]        = "MIN";
            $stdUniqueTaxableByTheMinuteEarnings[$i]["type"]                     = "E";
            $stdUniqueTaxableByTheMinuteEarnings[$i]["divider"]                  = 1;
            $stdUniqueTaxableByTheMinuteEarnings[$i]["requires_employee_amount"] = 0;
        }

        PayrollItem::insert($stdUniqueTaxableByTheMinuteEarnings);

        //  Reference: http://payrollhero.ph/ot_pay
        //  "On Double Holiday and at the same time Rest day Overtime" not included
        //  check later what this is for
        $stdUniqueTaxableByTheHourEarnings = [
            ["code" => "STD_E_RDOT", "payslip_display_string" => "Overtime", "description" => "Rest Day Overtime", "multiplier" => 1.69],
            ["code" => "STD_E_SHOT", "payslip_display_string" => "Overtime", "description" => "Special Holiday Overtime", "multiplier" => 1.69],
            ["code" => "STD_E_RDSHOT", "payslip_display_string" => "Overtime", "description" => "Rest Day Special Holiday Overtime", "multiplier" => 1.95],
            ["code" => "STD_E_RHOT", "payslip_display_string" => "Overtime", "description" => "Regular Holiday Overtime", "multiplier" => 2.6],
            ["code" => "STD_E_RDRHOT", "payslip_display_string" => "Overtime", "description" => "Rest Day Regular Holiday Overtime", "multiplier" => 3.9]
        ];

        for ($i = 0; $i < count($stdUniqueTaxableByTheHourEarnings); $i ++) {
            $stdUniqueTaxableByTheHourEarnings[$i]["standard"]                 = 1;
            $stdUniqueTaxableByTheHourEarnings[$i]["computation_basis"]        = "HR";
            $stdUniqueTaxableByTheHourEarnings[$i]["type"]                     = "E";
            $stdUniqueTaxableByTheHourEarnings[$i]["divider"]                  = 1;
            $stdUniqueTaxableByTheHourEarnings[$i]["requires_employee_amount"] = 0;
        }

        PayrollItem::insert($stdUniqueTaxableByTheHourEarnings);

        $stdSTDAdjustments = [
            ["code" => "STD_E_IAdj", "payslip_display_string" => "Income Adjustment", "description" => "Income Adjustment"],
        ];

        for ($i = 0; $i < count($stdSTDAdjustments); $i ++) {
            $stdSTDAdjustments[$i]["standard"]                 = 1;
            $stdSTDAdjustments[$i]["taxable"]                  = 0;
            $stdSTDAdjustments[$i]["computation_basis"]        = "EA";
            $stdSTDAdjustments[$i]["type"]                     = "E";
            $stdSTDAdjustments[$i]["multiplier"]               = 1;
            $stdSTDAdjustments[$i]["divider"]                  = 1;
            $stdSTDAdjustments[$i]["requires_employee_amount"] = 0;
        }

        PayrollItem::insert($stdSTDAdjustments);

        $stdSTDDeductionAdjustments = [
            ["code" => "STD_D_DAdj", "payslip_display_string" => "Deduction Adjustment", "description" => "Deduction Adjustment"],
        ];

        for ($i = 0; $i < count($stdSTDDeductionAdjustments); $i ++) {
            $stdSTDDeductionAdjustments[$i]["standard"]                 = 1;
            $stdSTDDeductionAdjustments[$i]["taxable"]                  = 0;
            $stdSTDDeductionAdjustments[$i]["computation_basis"]        = "EA";
            $stdSTDDeductionAdjustments[$i]["type"]                     = "D";
            $stdSTDDeductionAdjustments[$i]["multiplier"]               = 1;
            $stdSTDDeductionAdjustments[$i]["divider"]                  = 1;
            $stdSTDDeductionAdjustments[$i]["requires_employee_amount"] = 0;
        }

        PayrollItem::insert($stdSTDDeductionAdjustments);

        // </editor-fold>

        $others = [
            ["code" => "E_Incentive", "payslip_display_string" => "Incentive", "description" => "Incentives", "taxable" => 1, "type" => "E"],
            ["code" => "D_PrevAbsence", "payslip_display_string" => "Deduction Adjustment", "description" => "Previous Absence Deduction", "taxable" => 0, "type" => "D"]
        ];

        for ($i = 0; $i < count($others); $i ++) {
            $others[$i]["standard"]                 = 0;
            $others[$i]["computation_basis"]        = "EA";
            $others[$i]["multiplier"]               = 1;
            $others[$i]["divider"]                  = 1;
            $others[$i]["requires_employee_amount"] = 0;
        }

        PayrollItem::insert($others);

        //  TAX
        PayrollItem::insert([
            "code"                     => "STD_D_WHT",
            "payslip_display_string"   => "TAX",
            "description"              => "Witholding Tax",
            "computation_basis"        => "EA",
            "requires_employee_amount" => 0,
            "standard"                 => 1,
            "taxable"                  => 0,
            "type"                     => "D",
            "multiplier"               => 1,
            "divider"                  => 1,
        ]);
    }

}
