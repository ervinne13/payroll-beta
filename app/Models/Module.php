<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

    public $timestamps    = false;
    public $incrementing  = false;
    protected $table      = "module";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "description", "module_group_code", "relative_url"
    ];

}
