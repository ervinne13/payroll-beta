<?php

use App\Models\HR\TaxCategory;
use Illuminate\Database\Seeder;

class TaxCategoriesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $taxCategories = [
            ["code" => "HD", "description" => "Head of the family", "exemption_amount" => 50000],
            ["code" => "HF1", "description" => "Head of the family w/ 1 child", "exemption_amount" => 50000],
            ["code" => "HF2", "description" => "Head of the family w/ 2 children", "exemption_amount" => 50000],
            ["code" => "HF3", "description" => "Head of the family w/ 3 children", "exemption_amount" => 50000],
            ["code" => "HF4", "description" => "Head of the family w/ 4 children", "exemption_amount" => 50000],
            ["code" => "M", "description" => "Married", "exemption_amount" => 50000],
            ["code" => "M1", "description" => "Married w/ 1 child", "exemption_amount" => 75000],
            ["code" => "M2", "description" => "Married w/ 2 children", "exemption_amount" => 100000],
            ["code" => "M3", "description" => "Married w/ 3 children", "exemption_amount" => 125000],
            ["code" => "M4", "description" => "Married w/ 4 children", "exemption_amount" => 150000],
            ["code" => "S", "description" => "Single", "exemption_amount" => 0],
        ];

        TaxCategory::insert($taxCategories);
    }

}
