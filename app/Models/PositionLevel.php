<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PositionLevel extends Model {

    protected $table      = "position_level";
    protected $primaryKey = "code";
    public $incrementing  = false;
    protected $fillable   = [
        "code", "description", "level"
    ];

}
