<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

    protected $table      = "company";
    protected $primaryKey = "code";
    public $incrementing  = false;
    protected $fillable   = [
        "code", "name", "address"
    ];

}
