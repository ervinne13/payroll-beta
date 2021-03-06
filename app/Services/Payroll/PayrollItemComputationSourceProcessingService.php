<?php

namespace App\Services\Payroll;

use App\Models\HR\AttendanceSummary;
use App\Models\Payroll\PayrollEntry;
use App\Models\Payroll\PayrollItem;
use Exception;

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
     * @param type $attendanceSummary
     */
    public function getComputedAmount(PayrollItem $dependent, PayrollItem $dependency, PayrollEntry $generatedDependencyEntry, AttendanceSummary $attendanceSummary) {

        if ($dependent->computation_basis == "EA") {
            return $generatedDependencyEntry->amount;
        }

        $amount = 0;

        if ($dependency->computation_basis == "MON") {
            $amount = $this->getAmountFromMonth($dependent, $generatedDependencyEntry, $attendanceSummary);
        }

        if ($dependency->computation_basis == "DAY") {
            $amount = $this->getAmountFromDay($dependent, $generatedDependencyEntry, $attendanceSummary);
        }

        if ($dependency->computation_basis == "HR") {
            $amount = $this->getAmountFromHr($dependent, $generatedDependencyEntry, $attendanceSummary);
        }

        if ($dependency->computation_basis == "MIN") {
            $amount = $this->getAmountFromMin($dependent, $generatedDependencyEntry, $attendanceSummary);
        }

        return $amount * $generatedDependencyEntry->qty;
    }

    private function getAmountFromMonth(PayrollItem $dependent, PayrollEntry $generatedDependencyEntry, AttendanceSummary $attendanceSummary) {

        //  Month -> Month
        if ($dependent->computation_basis == "MON") {
            return $generatedDependencyEntry->amount;
        }

        //   Month -> Day = A / MD
        if ($dependent->computation_basis == "DAY") {
            return $generatedDependencyEntry->amount / $attendanceSummary->working_days;
        }

        //   Month -> Hour = A / (MD * 8)
        if ($dependent->computation_basis == "HR") {
            return $generatedDependencyEntry->amount / ($attendanceSummary->month_days * 8);
        }

        //   Month -> Minute = A / (MD * 8 * 60)
        if ($dependent->computation_basis == "MIN") {
            return $generatedDependencyEntry->amount / ($attendanceSummary->month_days * 8 * 60);
        }

        throw new Exception("Unrecognized computation basis {$dependent->computation_basis}");
    }

    private function getAmountFromDay(PayrollItem $dependent, PayrollEntry $generatedDependencyEntry, AttendanceSummary $attendaceSummary) {

        //  Day -> Mon = A * MD
        if ($dependent->computation_basis == "MON") {
            return $generatedDependencyEntry->amount * $attendaceSummary->month_days;
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

    private function getAmountFromHr(PayrollItem $dependent, PayrollEntry $generatedDependencyEntry, AttendanceSummary $attendanceSummary) {

        //  Hour -> Mon = A * MD * 8
        if ($dependent->computation_basis == "MON") {
            return $generatedDependencyEntry->amount * $attendanceSummary->month_days;
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

    private function getAmountFromMin(PayrollItem $dependent, PayrollEntry $generatedDependencyEntry, AttendanceSummary $attendanceSummary) {

        //  Min -> Mon = A * MD * 8 * 60
        if ($dependent->computation_basis == "MON") {
            return $generatedDependencyEntry->amount * $attendanceSummary->month_days * 8 * 60;
        }

        //   Min -> Day = A * 8 * 60
        if ($dependent->computation_basis == "DAY") {
            return $generatedDependencyEntry->amount * 8 * 60;
        }

        //   Min -> Hour = A * 60
        if ($dependent->computation_basis == "HR") {
            return $generatedDependencyEntry->amount * 60;
        }

        //   Min -> Minute = A
        if ($dependent->computation_basis == "MIN") {
            return $generatedDependencyEntry->amount;
        }

        throw new Exception("Unrecognized computation basis {$dependent->computation_basis}");
    }

}
