<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model {

    protected $table      = "position";
    protected $primaryKey = "code";
    public $incrementing  = false;
    protected $fillable   = [
        "code", "name", "parent_code", "position_level_code"
    ];

    public function positionLevel() {
        return $this->belongsTo(PositionLevel::class, "position_level_code");
    }

    public function parentPosition() {
        return $this->belongsTo(Position::class, "parent_code");
    }

    public function fill(array $attributes) {
        parent::fill($attributes);

        if (array_key_exists("parent_code", $attributes) && $attributes["parent_code"] == "none") {            
            $this->parent_code = NULL;
        }
    }

}
