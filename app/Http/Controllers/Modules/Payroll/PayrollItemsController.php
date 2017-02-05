<?php

namespace App\Http\Controllers\Modules\Payroll;

use App\Http\Controllers\Controller;
use App\Models\Payroll\PayrollItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class PayrollItemsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view('pages.payroll.payroll-items.index', $viewData);
    }

    public function datatable() {
        return Datatables::of(PayrollItem::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $viewData                = $this->getDefaultViewData();
        $viewData["payrollItem"] = new PayrollItem();
        $viewData["mode"]        = "create";

        return view("pages.payroll.payroll-items.form", $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {

        try {
            $payrollItem = new PayrollItem($request->toArray());
            $payrollItem->save();

            return $payrollItem;
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
        $viewData                = $this->getDefaultViewData();
        $viewData["payrollItem"] = PayrollItem::find($id);
        $viewData["mode"]        = "view";

        return view("pages.payroll.payroll-items.form", $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $viewData                = $this->getDefaultViewData();
        $viewData["payrollItem"] = PayrollItem::find($id);
        $viewData["mode"]        = "edit";

        return view("pages.payroll.payroll-items.form", $viewData);
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
            $payrollItem = PayrollItem::find($id);
            $payrollItem->fill($request->toArray());
            $payrollItem->save();

            return $payrollItem;
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
        try {
            PayrollItem::where("code", $id)->delete();
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

}
