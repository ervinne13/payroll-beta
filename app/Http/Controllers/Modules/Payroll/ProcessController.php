<?php

namespace App\Http\Controllers\Modules\Payroll;

use App\Http\Controllers\Controller;
use App\Models\HR\Employee;
use App\Models\Payroll\Payroll;
use App\Services\Payroll\AttendanceSummaryProcessorService;
use App\Services\Payroll\PayrollItemComputationSourceProcessingService;
use App\Services\Payroll\PayrollItemProcessingService;
use App\Services\Payroll\WorkingDayComputationService;
use function response;
use function view;

class ProcessController extends Controller {

    public function index() {
        $viewData              = $this->getDefaultViewData();
        $viewData["employees"] = Employee::active()->get();
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
        $attendanceSummaryProcessingSrvc            = new AttendanceSummaryProcessorService();

        return (new PayrollItemProcessingService($payrollItemComputationSourceProcessingSrvc, $attendanceSummaryProcessingSrvc))
                        ->processPayrollItems($employee, $payroll);
    }

}
