<?php

namespace App\Models\HR;

use App\Models\SGModel;
use DateTime;

class Holiday extends SGModel {

    protected $table      = "holiday";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "is_active", "holiday_type_code", "description", "date_start", "date_end"
    ];

    public function type() {
        return $this->belongsTo(HolidayType::class, 'holiday_type_code');
    }

    public function scopeType($query, $type) {
        return $query->where("holiday_type_code", $type);
    }

    public function scopeRegular($query) {
        return $query->where("holiday_type_code", "REG");
    }

    public function scopeFromMonthAndDay($query, DateTime $from) {
        return $query
                        ->where(function($query) use ($from) {
                            $query->whereMonth('date_start', '>', $from->format("m"));
                        })
                        ->orWhere(function($query) use ($from) {
                            $query
                            ->whereMonth('date_start', '=', $from->format("m"))
                            ->whereDay('date_start', '>=', $from->format("d"));
                        })

        ;
    }

    public function scopeToMonthAndDay($query, DateTime $to) {
        return $query
                        ->where(function($query) use ($to) {
                            $query->whereMonth('date_start', '<', $to->format("m"));
                        })
                        ->orWhere(function($query) use ($to) {
                            $query
                            ->whereMonth('date_start', '=', $to->format("m"))
                            ->whereDay('date_start', '<=', $to->format("d"));
                        })

        ;
    }

    public function scopeSpecialNonWorking($query) {
        return $query->where("holiday_type_code", "SNW");
    }

    public function scopeFrom($query, DateTime $from) {
        return $query->where("date_start", ">=", $from);
    }

    public function scopeTo($query, DateTime $to) {
        return $query->where("date_end", "<=", $to);
    }

}
