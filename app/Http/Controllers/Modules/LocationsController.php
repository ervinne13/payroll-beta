<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function view;

class LocationsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view('pages.locations.index', $viewData);
    }

    public function datatable() {
        return Datatables::of(Location::with("company"))->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $viewData             = $this->getDefaultFormViewData();
        $viewData["location"] = new Location();
        $viewData["mode"]     = "create";

        return view('pages.locations.form', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        try {
            $location = new Location($request->toArray());
            $location->save();
        } catch (\Exception $e) {
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
        $viewData["location"] = Location::find($id);
        $viewData["mode"]     = "view";

        return view('pages.locations.form', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $viewData             = $this->getDefaultFormViewData();
        $viewData["location"] = Location::find($id);
        $viewData["mode"]     = "edit";

        return view('pages.locations.form', $viewData);
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
            $location = Location::find($id);
            $location->fill($request->toArray());
            $location->save();
        } catch (\Exception $e) {
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
            Location::where("code", $id)->delete();
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    protected function getDefaultFormViewData() {
        $viewData              = $this->getDefaultViewData();
        $viewData["companies"] = Company::all();
        return $viewData;
    }

}
