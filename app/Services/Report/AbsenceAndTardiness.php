<?php

namespace App\Services\Report;

/**
 * Description of AbsenceAndTardiness
 *
 * @author ervinne
 */
class AbsenceAndTardiness {

    public $employee    = null;
    public $cutoffDays  = 0;
    public $daysPresent = 0;
    public $days        = [];

    public function __toString() {
        return json_encode($this);
    }

}
