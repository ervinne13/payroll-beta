<?php

namespace App\Http\Controllers\Modules\Payroll;

use App\Http\Controllers\Controller;
use App\Models\HR\Employee;
use App\Models\Payroll\Payroll;
use App\Services\Payroll\PayrollItemProcessingService;
use App\Services\Payroll\PayrollItemProcessorLookupService;
use App\Services\Payroll\WorkingDayComputationService;
use DateTime;
use function view;

class ProcessController extends Controller {

    public function index() {

        $payroll                  = Payroll::firstOrNew(["pay_period" => "2017-02-15"]);
        $payroll->cutoff_start    = DateTime::createFromFormat('Y-m-d', "2017-01-26");
        $payroll->cutoff_end      = DateTime::createFromFormat('Y-m-d', "2017-02-10");
        $payroll->next_pay_period = DateTime::createFromFormat('Y-m-d', "2017-03-01");

        $payroll->sss        = true;
        $payroll->tax        = true;
        $payroll->pagibig    = true;
        $payroll->philhealth = true;

        $payroll->save();

        $employee                  = Employee::find("20170120003");
        $lookupSrvc                = new PayrollItemProcessorLookupService();
        $workingDayComputationSrvc = new WorkingDayComputationService();

        return (new PayrollItemProcessingService($lookupSrvc, $workingDayComputationSrvc))->processPayrollItems($employee, $payroll);

        $viewData = $this->getDefaultViewData();
        return view("pages.payroll.process", $viewData);
    }

}
