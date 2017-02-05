<?php

namespace App\Http\Controllers\Modules\HR;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\HR\Employee;
use App\Models\HR\EmployeeWorkSchedule;
use App\Models\HR\Policy;
use App\Models\HR\TaxCategory;
use App\Models\HR\WorkSchedule;
use App\Models\Location;
use App\Models\Position;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class EmployeesController extends Controller {

    protected $title = "Employee | Payroll";

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view('pages.hr.employees.index', $viewData);
    }

    public function datatable() {
        return Datatables::of(Employee::with('policy')
                                ->with('position')
                                ->with('company')
                                ->with('location'))
                        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $viewData             = $this->getDefaultFormViewData();
        $viewData["employee"] = new Employee();
        $viewData["mode"]     = "create";

        return view("pages.hr.employees.form", $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {

        try {
            $employee = new Employee();
            $this->saveEmployee($employee, $request);
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {

        $viewData             = $this->getDefaultFormViewData();
        $viewData["employee"] = Employee::find($id);
        $viewData["mode"]     = "view";

        return view("pages.hr.employees.form", $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $viewData             = $this->getDefaultFormViewData();
        $viewData["employee"] = Employee::find($id);
        $viewData["mode"]     = "edit";

        return view("pages.hr.employees.form", $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        try {
            $employee = Employee::find($id);
            $this->saveEmployee($employee, $request);
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
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

    public function destroyEmployeeWorkSchedule($employeeId, $effectiveDate) {
        try {
            EmployeeWorkSchedule::where("employee_code", $employeeId)
                    ->where("effective_date", $effectiveDate)
                    ->delete()
            ;
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    protected function getDefaultFormViewData() {
        $viewData = $this->getDefaultViewData();

        $viewData["positions"] = Position::all();

        $viewData["taxCategories"] = TaxCategory::all();

        $viewData["companies"] = Company::all();
        $viewData["locations"] = Location::all();

        $viewData["policies"] = Policy::all();

        $viewData["workSchedules"] = WorkSchedule::all();

        return $viewData;
    }

    protected function saveEmployee(Employee $employee, Request $request) {
        try {
            DB::beginTransaction();
            $employee->fill($request->toArray());
            $employee->save();

            if ($request->modifiedWorkSchedules) {
                EmployeeWorkSchedule::where("employee_code", $employee->code)->delete();
                EmployeeWorkSchedule::insert($request->modifiedWorkSchedules);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
