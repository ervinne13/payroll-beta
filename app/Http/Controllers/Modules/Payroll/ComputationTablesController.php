<?php

namespace App\Http\Controllers\Modules\Payroll;

use App\Http\Controllers\Controller;
use App\Models\Payroll\TaxComputation;

class ComputationTablesController extends Controller {

    public function index($type) {
        $viewData = $this->getDefaultViewData();
        if ($type == "tax") {
            $viewData["taxComputations"] = TaxComputation::all();
            return view("pages.payroll.computation-tables.tax", $viewData);
        }
    }

}
