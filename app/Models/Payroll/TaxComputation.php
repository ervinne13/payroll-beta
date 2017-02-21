<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Model;

class TaxComputation extends Model {

    public $timestamps  = false;
    protected $table    = "tax_computation";
    protected $fillable = ["over_amount", "below_amount", "tax_due", "percent"];

}
