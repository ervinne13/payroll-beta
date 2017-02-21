<?php

namespace App\Http\Controllers\Modules\HR;

use App\Http\Controllers\Controller;
use App\Models\HR\Policy;
use App\Models\HR\PolicyPayrollItem;
use App\Models\Payroll\PayrollItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use function response;
use function view;

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

    public function employeePolicy($policyCode, $employeeId) {
        $policy = Policy::with('payrollItems')
                ->with(['payrollItems.employeePayrollItemComputation' => function($query) use ($employeeId) {
                        $query->where("employee_code", $employeeId);
                        return $query;
                    }])
                ->find($policyCode);

        if (!$policy) {
            return response("Policy not found", 404);
        }

        return $policy;
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

    public function create() {
        $viewData = $this->getDefaultFormViewData();

        $viewData["policy"] = new Policy();
        $viewData["mode"]   = "create";

        return view("pages.hr.policies.form", $viewData);
//        return $viewData;
    }

    public function store(Request $request) {

        try {

            $policy = new Policy($request->toArray());
            $policy->save();

            PolicyPayrollItem::insert($this->setNullOnEmptyComputationSource($request->policyPayrollItems));
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    public function edit($code) {
        $viewData = $this->getDefaultFormViewData($code);

        $viewData["policy"] = Policy::find($code);
        $viewData["mode"]   = "edit";

//        return $viewData;
        return view("pages.hr.policies.form", $viewData);
    }

    public function update(Request $request, $code) {
        try {

            $policy = Policy::find($code);

            if (!$policy) {
                return response("Policy not found", 404);
            }

            $policy->fill($request->toArray());
            $policy->save();

            PolicyPayrollItem::where("policy_code", $policy->code)->delete();
            PolicyPayrollItem::insert($this->setNullOnEmptyComputationSource($request->policyPayrollItems));
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    public function destroy($code) {
        try {
            Policy::destroy($code);
        } catch (Exception $e) {
            return response("Unable to delete policy, it may have been used in an employee already.", 500);
        }
    }

    protected function getDefaultFormViewData($policyCode = null) {
        $viewData = $this->getDefaultViewData();

        $viewData["payrollItems"] = PayrollItem::Active()
                ->with(["policyPayrollItem" => function($query) use ($policyCode) {
                        $query->where("policy_code", $policyCode);
                        return $query;
                    }])
                ->orderBy("description")
                ->get();

        return $viewData;
    }

    protected function setNullOnEmptyComputationSource($policyPayrollItems) {
        for ($i = 0; $i < count($policyPayrollItems); $i ++) {
            if (!$policyPayrollItems[$i]["computation_source"]) {
                $policyPayrollItems[$i]["computation_source"] = null;
            }
        }

        return $policyPayrollItems;
    }

}
