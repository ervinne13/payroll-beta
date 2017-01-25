<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NumberSeries extends Model {

    public $timestamps    = false;
    public $incrementing  = false;
    protected $table      = "number_series";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "is_active", "description", "module_code", "start_number", "end_number", "last_number_used", "expiry_date"
    ];

}
