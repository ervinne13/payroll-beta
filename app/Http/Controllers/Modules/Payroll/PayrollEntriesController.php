<?php

namespace App\Http\Controllers\Modules\Payroll;

use App\Http\Controllers\Controller;
use App\Models\HR\Employee;
use App\Models\Payroll\Payroll;
use App\Models\Payroll\PayrollEntry;
use App\Models\Payroll\PayrollItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Facades\Datatables;
use function view;

class PayrollEntriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $viewData = $this->getDefaultViewData();
        return view("pages.payroll.payroll-entries.index", $viewData);
    }

    public function entriesJSON($employeeCode, $payPeriod)
    {
        return PayrollEntry::Employee($employeeCode)
                ->PayrollPeriod($payPeriod)
                ->with('payrollItem')
                ->get();
    }

    public function datatable($employeeCode, $payPeriod)
    {

        $query = PayrollEntry::Employee($employeeCode)->PayrollPeriod($payPeriod);

        return Datatables::of($query)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $viewData['payrollEntry'] = new PayrollEntry();
        $viewData['employees']    = Employee::all();
        $viewData['payrollItems'] = PayrollItem::all();
        $viewData["mode"]         = "create";

        return view('pages.payroll.payroll-entries.form', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $payroll = Payroll::LatestOpen()->first();

        $payrollEntry                     = new PayrollEntry($request->toArray());
        $payrollEntry->date_applied       = Carbon::now();
        $payrollEntry->payroll_pay_period = $payroll->pay_period;
        $payrollEntry->payroll_generated  = false;

        $payrollEntry->save();

        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @Override
     */
    protected function getDefaultViewData()
    {
        $viewData = parent::getDefaultViewData();

        $viewData["employees"] = Employee::OrderBy("first_name")->get();

        return $viewData;
    }

}
