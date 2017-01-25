<?php

namespace App\Http\Controllers\Modules\HR;

use App\Http\Controllers\Controller;
use App\Models\HR\Shift;
use App\Models\HR\WorkSchedule;
use App\Models\HR\WorkScheduleShift;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class WorkSchedulesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view('pages.hr.work-schedules.index', $viewData);
    }

    public function datatable() {
        return Datatables::of(WorkSchedule::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $viewData                 = $this->getDefaultFormViewData();
        $viewData["workSchedule"] = new WorkSchedule();
        $viewData["mode"]         = "create";

        return view('pages.hr.work-schedules.form', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $workSchedule = new WorkSchedule();
        return $this->saveWorkSchedule($request, $workSchedule);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $viewData                 = $this->getDefaultFormViewData();
        $viewData["workSchedule"] = WorkSchedule::find($id);
        $viewData["mode"]         = "view";

        return view('pages.hr.work-schedules.form', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $viewData                 = $this->getDefaultFormViewData();
        $viewData["workSchedule"] = WorkSchedule::find($id);
        $viewData["mode"]         = "edit";

        return view('pages.hr.work-schedules.form', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $workSchedule = WorkSchedule::find($id);

        if ($workSchedule) {
            return $this->saveWorkSchedule($request, $workSchedule);
        } else {
            return response("Work scheuld {$id} not found", 404);
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
            DB::beginTransaction();

            WorkScheduleShift::where("work_schedule_code", $id)->delete();
            WorkSchedule::where("code", $id)->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response($e->getMessage(), 500);
        }
    }

    protected function getDefaultFormViewData() {
        $viewData           = $this->getDefaultViewData();
        $viewData["shifts"] = Shift::all();
        return $viewData;
    }

    protected function saveWorkSchedule(Request $request, WorkSchedule $workSchedule) {

        try {
            DB::beginTransaction();

            $workSchedule->fill($request->toArray());
            $workSchedule->save();

            $workDays = $request->workDays;

            foreach ($workDays AS $workDay) {
                $workDay["work_schedule_code"] = $workSchedule->code;
                $workScheduleShift             = WorkScheduleShift::firstOrNew($workDay);
                $workScheduleShift->save();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response($e->getMessage(), 500);
        }
    }

}
