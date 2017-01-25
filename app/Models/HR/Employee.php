<?php

namespace App\Models\HR;

use App\Models\Company;
use App\Models\Location;
use App\Models\Position;
use App\Models\SGModel;

class Employee extends SGModel {

    protected $table    = "employee";
    protected $fillable = [
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

//    public function scopeDatatable($query) {
//        return $query
//                ->select([
//                    "email"
//                ])
//                        ->leftJoin('company', 'company.code', '=', 'employee.company_code')
//                        ->leftJoin('location', 'location.code', '=', 'employee.location_code')
//                        ->leftJoin('policy', 'policy.code', '=', 'employee.policy_code')
//        ;
//    }

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

    // </editor-fold>
}
