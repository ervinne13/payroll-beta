<?php

namespace App\Models\HR;

use App\Models\SGModel;

class TaxCategory extends SGModel {

    protected $table      = "tax_category";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "description", "exemption_amount"
    ];

}
