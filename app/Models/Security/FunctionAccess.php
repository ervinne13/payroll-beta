<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class FunctionAccess extends Model {

    public $timestamps    = false;
    protected $table      = "function_access";
    protected $primaryKey = ["role_code", "module_code", "function_code"];

}
