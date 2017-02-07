<?php

namespace App\Http\Controllers\Modules\Payroll;

use App\Http\Controllers\Controller;
use App\Models\HR\Employee;
use App\Models\Payroll\Payroll;
use App\Services\Payroll\PayrollItemComputationSourceProcessingService;
use App\Services\Payroll\PayrollItemProcessingService;
use App\Services\Payroll\WorkingDayComputationService;
use DateTime;
use function view;

class ProcessController extends Controller {

    public function index() {

        $viewData = $this->getDefaultViewData();
        return view("pages.payroll.process", $viewData);
    }

    public function processEmployee($employeeCode, $payPeriod) {

        $payroll  = Payroll::find($payPeriod);
        $employee = Employee::find($employeeCode);

        // <editor-fold defaultstate="collapsed" desc="Validation">
        if (!$payroll) {
            return response("Payroll for period {$payPeriod} not found", 404);
        }

        if (!$employee) {
            return response("Employee {$employee} ", 404);
        }
        // </editor-fold>

        $payrollItemComputationSourceProcessingSrvc = new PayrollItemComputationSourceProcessingService();
        $workingDayComputationSrvc                  = new WorkingDayComputationService();

        return (new PayrollItemProcessingService($payrollItemComputationSourceProcessingSrvc, $workingDayComputationSrvc))
                        ->processPayrollItems($employee, $payroll);
    }

}
