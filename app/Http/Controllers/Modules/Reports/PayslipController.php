<?php

namespace App\Http\Controllers\Modules\Reports;

use App\Http\Controllers\Controller;
use App\Models\HR\AttendanceSummary;
use App\Models\HR\Employee;
use Illuminate\Http\Response;
use function view;

class PayslipController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();

        $viewData["employees"] = Employee::Active()->alphabeticalFirstName()->get();

        return view("pages.reports.payslip.index", $viewData);
    }

    public function employee($employeeCode, $payPeriod) {

        $summary = AttendanceSummary::of($employeeCode, $payPeriod)
                ->with('payroll', 'payroll.payrollEntries', 'payroll.payrollEntries.payrollItem')
                ->with('employee', 'employee.position')               
                ->first();

        if ($summary) {
            return $summary;
        } else {
            return response("Payroll record not found. Please check employee and payroll period.", 404);
        }
    }

}
