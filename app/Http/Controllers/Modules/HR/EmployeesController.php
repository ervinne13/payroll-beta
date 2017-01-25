<?php

namespace App\Http\Controllers\Modules\HR;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\HR\Employee;
use App\Models\HR\Policy;
use App\Models\HR\TaxCategory;
use App\Models\Location;
use App\Models\Position;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class EmployeesController extends Controller {

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
            $employee = new Employee($request->toArray());
            $employee->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
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

    protected function getDefaultFormViewData() {
        $viewData = $this->getDefaultViewData();

        $viewData["positions"] = Position::all();

        $viewData["taxCategories"] = TaxCategory::all();

        $viewData["companies"] = Company::all();
        $viewData["locations"] = Location::all();

        $viewData["policies"] = Policy::all();

        return $viewData;
    }

}
