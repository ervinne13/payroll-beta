<?php

namespace App\Http\Controllers\Modules\HR;

use App\Http\Controllers\Controller;
use App\Models\HR\Holiday;
use App\Models\HR\HolidayType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class HolidaysController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $viewData = $this->getDefaultViewData();
        return view('pages.hr.holidays.index', $viewData);
    }

    public function datatable() {
        return Datatables::of(Holiday::with('type'))->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $viewData            = $this->getDefaultFormViewData();
        $viewData["holiday"] = new Holiday();
        $viewData["mode"]    = "create";

        return view('pages.hr.holidays.form', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {

        try {
            $holiday = new Holiday($request->toArray());
            $holiday->save();
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
        $viewData            = $this->getDefaultFormViewData();
        $viewData["holiday"] = Holiday::find($id);
        $viewData["mode"]    = "view";

        return view('pages.hr.holidays.form', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $viewData            = $this->getDefaultFormViewData();
        $viewData["holiday"] = Holiday::find($id);
        $viewData["mode"]    = "edit";

        return view('pages.hr.holidays.form', $viewData);
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
            $holiday = Holiday::find($id);
            $holiday->fill($request->toArray());
            $holiday->update();
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
            Holiday::destroy($id);
        } catch (Exception $e) {
            return response("Error deleting record, it's possible that this is used by other records.", 500);
        }
    }

    // <editor-fold defaultstate="collapsed" desc="Utility Methods">

    protected function getDefaultFormViewData() {
        $viewData = $this->getDefaultViewData();

        $viewData["holidayTypes"] = HolidayType::all();

        return $viewData;
    }

    // </editor-fold>
}
