<?php

namespace App\Http\Controllers\Modules\HR;

use App\Http\Controllers\Controller;
use App\Models\HR\Shift;
use App\Models\HR\ShiftBreak;
use App\Models\HR\ShiftHasBreak;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\RecursionContext\Exception;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class ShiftsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $viewData = $this->getDefaultViewData();
        return view('pages.hr.shifts.index', $viewData);
    }

    public function datatable() {
        return Datatables::of(Shift::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $viewData          = $this->getDefaultFormViewData();
        $viewData["shift"] = new Shift();
        $viewData["mode"]  = "create";

        return view('pages.hr.shifts.form', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        try {

            DB::beginTransaction();

            $this->fillAndSaveShift($request, new Shift());

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
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
        $viewData          = $this->getDefaultFormViewData();
        $viewData["shift"] = Shift::with('breaks')->where("code", $id)->first();
        $viewData["mode"]  = "view";

//        return $viewData["shift"];
        return view('pages.hr.shifts.form', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $viewData          = $this->getDefaultFormViewData();
        $viewData["shift"] = Shift::find($id);
        $viewData["mode"]  = "edit";

        return view('pages.hr.shifts.form', $viewData);
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

            DB::beginTransaction();

            $this->fillAndSaveShift($request, Shift::find($id));

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
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
            Shift::destroy($id);
        } catch (Exception $e) {
            return response("Error deleting record, it's possible that this is used by other records.", 500);
        }
    }

    protected function getDefaultFormViewData() {
        $viewData = $this->getDefaultViewData();

        $viewData["breaks"] = ShiftBreak::all();

        return $viewData;
    }

    protected function fillAndSaveShift(Request $request, $shift) {
        $shift->fill($request->toArray());
        $shift->save();

        if ($request->breaks) {

            ShiftHasBreak::where("shift_code", $shift->code)->delete();

            $breaks = [];
            foreach ($request->breaks AS $break_code) {
                array_push($breaks, [
                    "shift_code"       => $shift->code,
                    "shift_break_code" => $break_code,
                ]);
            }

            ShiftHasBreak::insert($breaks);
        }

        return $shift;
    }

}
