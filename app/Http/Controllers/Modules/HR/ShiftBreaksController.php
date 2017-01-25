<?php

namespace App\Http\Controllers\Modules\HR;

use App\Http\Controllers\Controller;
use App\Models\HR\ShiftBreak;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class ShiftBreaksController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $viewData = $this->getDefaultViewData();
        return view('pages.hr.shift-breaks.index', $viewData);
    }

    public function datatable() {
        return Datatables::of(ShiftBreak::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $viewData               = $this->getDefaultViewData();
        $viewData["shiftBreak"] = new ShiftBreak();
        $viewData["mode"]       = "create";

        return view('pages.hr.shift-breaks.form', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {

        try {
            $shiftBreak = new ShiftBreak($request->toArray());
            $shiftBreak->save();
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
        $viewData               = $this->getDefaultViewData();
        $viewData["shiftBreak"] = ShiftBreak::find($id);
        $viewData["mode"]       = "view";

        return view('pages.hr.shift-breaks.form', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $viewData               = $this->getDefaultViewData();
        $viewData["shiftBreak"] = ShiftBreak::find($id);
        $viewData["mode"]       = "edit";

        return view('pages.hr.shift-breaks.form', $viewData);
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
            $shiftBreak = ShiftBreak::find($id);
            $shiftBreak->fill($request->toArray());
            $shiftBreak->save();
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
            ShiftBreak::destroy($id);
        } catch (Exception $e) {
            return response("Error deleting record, it's possible that this is used by other records.", 500);
        }
    }

}
