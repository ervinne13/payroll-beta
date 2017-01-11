<?php

namespace App\Http\Controllers\Modules\Payroll;

use App\Http\Controllers\Controller;
use function view;

class ProcessController extends Controller {

    public function index() {
        $viewData = $this->getDefaultViewData();
        return view("pages.payroll.process", $viewData);
    }

}
