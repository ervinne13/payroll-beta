<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleGroup extends Model {

    public $timestamps    = false;
    protected $table      = "module_group";
    protected $primaryKey = "code";

}
