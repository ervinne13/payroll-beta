<?php

namespace App\Models\HR;

use App\Models\Company;
use App\Models\Location;
use App\Models\Payroll\ChronoLog;
use App\Models\Payroll\Payroll;
use App\Models\Position;
use App\Models\SGModel;

class Employee extends SGModel {

    protected $table      = "employee";
    protected $primaryKey = "code";
    //
    /*     * ************************************************************************* */
    // <editor-fold defaultstate="collapsed" desc="Fillable">

    protected $fillable = [
        "salary",
        "is_active",
        "email",
        "first_name",
        "middle_name",
        "last_name",
        "address",
        "birth_date",
        "gender_code",
        "civil_status_code",
        "contact_number_1",
        "contact_number_2",
        "phone_number",
        "date_hired",
        "date_dismissed",
        "work_status_code",
        "location_code",
        "company_code",
        "position_code",
        "tax_category_code",
        "policy_code"
    ];

    // </editor-fold>

    /*     * ************************************************************************* */
    // <editor-fold defaultstate="collapsed" desc="Functions">

    public function getWorkingDayCount(Payroll $payroll) {

        $from = $payroll->cutoff_start;
        $to   = $payroll->cutoff_end;

        $interval = date_diff($to, $from);
        $days     = $interval->format("%a");

        for ($i = 0; $i < $days; $i ++) {
            
        }
    }

    public function getMinuteSalary($cutOffDays) {
        
    }

    public function getDaySalary(Payroll $payroll) {
        
    }

    // </editor-fold>    

    /*     * ************************************************************************* */
    // <editor-fold defaultstate="collapsed" desc="Relationships">

    public function location() {
        return $this->belongsTo(Location::class, "location_code");
    }

    public function company() {
        return $this->belongsTo(Company::class, "company_code");
    }

    public function position() {
        return $this->belongsTo(Position::class, "position_code");
    }

    public function taxCategory() {
        return $this->belongsTo(TaxCategory::class, "tax_category_code");
    }

    public function policy() {
        return $this->belongsTo(Policy::class, "policy_code");
    }

    public function employeeWorkSchedules() {
        return $this->hasMany(EmployeeWorkSchedule::class, "employee_code");
    }

//    
//    public function workSchedules() {
//        return $this->belongsToMany($related, $table, $foreignKey, $otherKey)
//    }
    // </editor-fold>

    /*     * ************************************************************************* */
    // <editor-fold defaultstate="collapsed" desc="Payroll Relationships">

    public function chronoLog() {
        return $this->hasMany(ChronoLog::class, "employee_code");
    }       

    // </editor-fold>
}
