<?php

namespace App\Models\Security;

use App\Models\SGModel;

class Role extends SGModel {

    protected $table      = "role";
    protected $primaryKey = "code";
    public $incrementing  = false;

    public function accessList() {
        return $this->hasMany(ModuleAccess::class);
    }

}
