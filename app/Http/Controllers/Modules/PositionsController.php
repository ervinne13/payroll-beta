<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\PositionLevel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class PositionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view('pages.positions.index', $viewData);
    }

    public function datatable() {
        return Datatables::of(Position::with('parentPosition')->with('positionLevel'))->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $viewData             = $this->getDefaultFormViewData();
        $viewData["position"] = new Position();
        $viewData["mode"]     = "create";

        return view("pages.positions.form", $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {

        try {
            $position = new Position();
            $position->fill($request->toArray());
            $position->save();
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
        $viewData["position"] = Position::find($id);
        $viewData["mode"]     = "view";

        return view("pages.positions.form", $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $viewData             = $this->getDefaultFormViewData();
        $viewData["position"] = Position::find($id);
        $viewData["mode"]     = "edit";

        return view("pages.positions.form", $viewData);
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
            $position = Position::find($id);
            $position->fill($request->toArray());
            $position->save();
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
            Position::where("code", $id)->delete();
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    protected function getDefaultFormViewData() {

        $viewData              = $this->getDefaultViewData();
        $viewData["positions"] = Position::all();
        $viewData["levels"]    = PositionLevel::all();
        return $viewData;
    }

}
