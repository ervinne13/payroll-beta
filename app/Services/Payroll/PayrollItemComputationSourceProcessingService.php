<?php

namespace App\Services\Payroll;

use App\Models\Payroll\PayrollEntry;
use App\Models\Payroll\PayrollItem;

/**
 * Description of PayrollItemComputationSourceProcessingService
 *
 * @author ervinne
 */
class PayrollItemComputationSourceProcessingService {

    /**
     * <pre>
     * Formulas:
     * Month -> Day
     *  A / MD
     * Month -> Hour
     *  A / (MD * 8)
     * Month -> Minute
     *  A / (MD * 8 * 60) 
     * 
     * Day -> Hour
     *  A / 8
     * Day -> Minute
     *  A / (8 * 60)
     * 
     * Hour -> Minute
     *  A / 60
     * 
     * Where:
     *  A = amount
     *  MD = Month Days
     * 
     * </pre>
     * 
     * @param PayrollItem $dependent
     * @param PayrollItem $dependency
     * @param type $workingDayComputation
     */
    public function getComputedAmount(PayrollItem $dependent, PayrollItem $dependency, PayrollEntry $generatedDependencyEntry, $workingDayComputation) {

        if ($dependency->computation_basis == "MON") {
            return $this->getAmountFromMonth($dependent, $generatedDependencyEntry, $workingDayComputation);
        }

        if ($dependency->computation_basis == "DAY") {
            return $this->getAmountFromDay($dependent, $generatedDependencyEntry, $workingDayComputation);
        }

        if ($dependency->computation_basis == "HR") {
            return $this->getAmountFromHr($dependent, $generatedDependencyEntry, $workingDayComputation);
        }
    }

    private function getAmountFromMonth(PayrollItem $dependent, PayrollEntry $generatedDependencyEntry, $workingDayComputation) {

        //  Month -> Month
        if ($dependent->computation_basis == "MON") {
            return $generatedDependencyEntry->amount;
        }

        //   Month -> Day = A / MD
        if ($dependent->computation_basis == "DAY") {
            return $generatedDependencyEntry->amount / $workingDayComputation["workingMonthDayCount"];
        }

        //   Month -> Hour = A / (MD * 8)
        if ($dependent->computation_basis == "HR") {
            return $generatedDependencyEntry->amount / ($workingDayComputation["workingMonthDayCount"] * 8);
        }

        //   Month -> Minute = A / (MD * 8 * 60)
        if ($dependent->computation_basis == "MIN") {
            return $generatedDependencyEntry->amount / ($workingDayComputation["workingMonthDayCount"] * 8 * 60);
        }

        throw new Exception("Unrecognized computation basis {$dependent->computation_basis}");
    }

    private function getAmountFromDay(PayrollItem $dependent, PayrollEntry $generatedDependencyEntry, $workingDayComputation) {

        //  Day -> Mon = A * MD
        if ($dependent->computation_basis == "MON") {
            return $generatedDependencyEntry->amount * $workingDayComputation["workingMonthDayCount"];
        }

        //   Day -> Day
        if ($dependent->computation_basis == "DAY") {
            return $generatedDependencyEntry->amount;
        }

        //   Month -> Hour = A / 8
        if ($dependent->computation_basis == "HR") {
            return $generatedDependencyEntry->amount / 8;
        }

        //   Month -> Minute = A / (8 * 60)
        if ($dependent->computation_basis == "MIN") {
            return $generatedDependencyEntry->amount / (8 * 60);
        }

        throw new Exception("Unrecognized computation basis {$dependent->computation_basis}");
    }

    private function getAmountFromHr(PayrollItem $dependent, PayrollEntry $generatedDependencyEntry, $workingDayComputation) {

        //  Hour -> Mon = A * MD * 8
        if ($dependent->computation_basis == "MON") {
            return $generatedDependencyEntry->amount * $workingDayComputation["workingMonthDayCount"];
        }

        //   Hour-> Day = A * 8
        if ($dependent->computation_basis == "DAY") {
            return $generatedDependencyEntry->amount * 8;
        }

        //   Hour -> Hour
        if ($dependent->computation_basis == "HR") {
            return $generatedDependencyEntry->amount;
        }

        //   Hour -> Minute = A / 60
        if ($dependent->computation_basis == "MIN") {
            return $generatedDependencyEntry->amount / 60;
        }

        throw new Exception("Unrecognized computation basis {$dependent->computation_basis}");
    }

}
