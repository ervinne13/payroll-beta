<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

    protected $table      = "location";
    protected $primaryKey = "code";
    public $incrementing  = false;
    protected $fillable = [
        "code", "description", "company_code", "address"
    ];

    public function company() {
        return $this->belongsTo(Company::class, "company_code");
    }

}
