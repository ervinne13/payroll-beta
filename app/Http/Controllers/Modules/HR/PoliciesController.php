<?php

namespace App\Http\Controllers\Modules\HR;

use App\Http\Controllers\Controller;
use App\Models\HR\Policy;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;

class PoliciesController extends Controller {

    protected $title = "Policy | Payroll";
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $viewData = $this->getDefaultViewData();
        return view('pages.hr.policies.index', $viewData);
    }

    public function datatable() {
        return Datatables::of(Policy::query())->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {

        $viewData           = $this->getDefaultViewData();
        $viewData["policy"] = Policy::find($id);

        return view('pages.hr.policies.printout', $viewData);
    }

}
