<?php

namespace App\Http\Controllers\Modules\Timekeeping;

use App\Http\Controllers\Controller;
use App\Models\HR\Employee;
use App\Models\Payroll\ChronoLog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function view;

class EmployeesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view("pages.timekeeping.employees.index", $viewData);
    }

    public function chronologDatatable($employeeCode) {
        return Datatables::of(ChronoLog::where("employee_code", $employeeCode))->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {

        $viewData             = $this->getDefaultViewData();
        $viewData["employee"] = Employee::find($id);
        $viewData["mode"]     = "view";

        return view("pages.timekeeping.employees.form", $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
