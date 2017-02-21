<?php

namespace App\Models\Payroll;

use App\Models\SGModel;

class EmployeeAccumulatedData extends SGModel {
    
    protected $table = "employee_accumulated_data";
    protected $primaryKey = ["year", "employee_code"];
    
}
