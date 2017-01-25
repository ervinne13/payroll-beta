<?php

namespace App\Models\Security;

use App\Models\Module;
use Illuminate\Database\Eloquent\Model;

class ModuleAccess extends Model {

    public $timestamps    = false;
    protected $table      = "module_access";
    protected $primaryKey = ["role_code", "module_code"];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function module() {
        return $this->hasOne(Module::class);
    }

}
