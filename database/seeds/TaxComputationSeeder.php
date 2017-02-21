<?php

use App\Models\Payroll\TaxComputation;
use Illuminate\Database\Seeder;

class TaxComputationSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        //  Source: http://www.bir.gov.ph/index.php/tax-information/income-tax.html
        $taxComputations = [
            ["over_amount" => 0, "below_amount" => 10000, "tax_due" => 0, "percent" => 5],
            // ex. P500 + 10% of the Excess over P10,000
            ["over_amount" => 10000, "below_amount" => 29999, "tax_due" => 500, "percent" => 10],
            ["over_amount" => 30000, "below_amount" => 69999, "tax_due" => 2500, "percent" => 15],
            ["over_amount" => 70000, "below_amount" => 139999, "tax_due" => 8500, "percent" => 20],
            ["over_amount" => 140000, "below_amount" => 24999, "tax_due" => 22500, "percent" => 25],
            ["over_amount" => 250000, "below_amount" => 49999, "tax_due" => 50000, "percent" => 30],
            ["over_amount" => 500000, "below_amount" => 9999999, "tax_due" => 125000, "percent" => 32],
        ];

        TaxComputation::insert($taxComputations);
    }

}
