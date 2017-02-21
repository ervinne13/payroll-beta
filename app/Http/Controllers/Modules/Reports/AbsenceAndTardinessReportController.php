<?php

namespace App\Http\Controllers\Modules\Reports;

use App\Http\Controllers\Controller;
use App\Models\HR\Employee;
use App\Services\Payroll\AttendanceSummaryProcessorService;
use Exception;
use function response;
use function view;

class AbsenceAndTardinessReportController extends Controller {

    public function index() {
        $viewData = $this->getDefaultViewData();

        $viewData["employees"] = Employee::Active()->get();

        return view("pages.reports.absence-and-tardiness.index", $viewData);
    }

    public function employee($employeeCode, $from, $to) {

        $employee = Employee::find($employeeCode);

        if (!$employee) {
            return response("Employee not found", 404);
        }

        try {
            $service = new AttendanceSummaryProcessorService();
            return $service->getAbsenceAndTardines($employee, $from, $to);
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

}
