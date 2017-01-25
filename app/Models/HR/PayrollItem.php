<?php

namespace App\Models\HR;

use App\Models\SGModel;

class PayrollItem extends SGModel {

    protected $table      = "payroll_item";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "is_active", "description", "standard", "taxable", "type", "computation_basis", "special_holiday_rate", "regular_holiday_rate"
    ];

    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);

        $this->special_holiday_rate = 100;
        $this->regular_holiday_rate = 100;
    }

}
