<?php

namespace App\Http\Controllers\Modules\Security;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\HR\Employee;
use App\Models\Location;
use App\Models\Security\Role;
use App\Models\Security\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Yajra\Datatables\Datatables;
use function response;
use function view;

class UsersController extends Controller {

    public function index() {
        $viewData = $this->getDefaultViewData();
        return view("pages.security.users.index", $viewData);
    }

    public function datatable() {
        return Datatables::of(User::query())->make(true);
    }

    public function create() {

        $viewData         = $this->getDefaultFormViewData();
        $viewData["user"] = new User();
        $viewData["mode"] = "create";

        return view("pages.security.users.form", $viewData);
    }

    public function edit(Request $request, $id) {

        $viewData         = $this->getDefaultFormViewData();
        $viewData["user"] = User::find($id);
        $viewData["mode"] = "edit";

        if (!$viewData["user"]) {
            throw new NotFoundHttpException("User with I.D. {$id} not found");
        }

        return view("pages.security.users.form", $viewData);
    }

    public function store(Request $request) {
        $user = new User($request->toArray());
        return $this->saveUser($request, $user);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        return $this->saveUser($request, $user);
    }

    protected function getDefaultFormViewData() {
        $viewData              = $this->getDefaultViewData();
        $viewData["locations"] = Location::all();
        $viewData["companies"] = Company::all();
        $viewData["roles"]     = Role::all();
        $viewData["employees"] = Employee::all();
        return $viewData;
    }

    protected function saveUser(Request $request, User $user) {
        try {
            $user->fill($request->toArray());
            $user->password = \Hash::make($request->password);

            if ($request->employee_id == "none") {
                $user->employee_id = null;
            }

            $user->save();
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    public function destroy($id) {
        
        if ($id == "admin") {
            return response("Cannot delete user admin. This is a system reserved user");
        }
        
        try {
            User::find($id)->delete();
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

}
