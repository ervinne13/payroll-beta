<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services\Payroll;

use App\Models\HR\AttendanceSummary;
use App\Models\HR\Employee;
use App\Models\HR\Holiday;
use App\Models\HR\Shift;
use App\Models\HR\WorkSchedule;
use App\Models\Payroll\Payroll;
use App\Services\Payroll\Exceptions\NoWorkScheduleException;
use App\Services\Report\AbsenceAndTardiness;
use DateTime;

/**
 * Description of WorkingDayComputationService
 *
 * @author ervinne
 */
class AttendanceSummaryProcessorService {

    const DAY_OFF_SHIFT_CODE = "DO";

    /**
     *  For faster lookup of applicable work schedule, an index will be kept.
     * This contains the index of the last work schedule that's found applicable
     * for the current date.
     * @var integer
     */
    protected $lastApplicableWorkScheduleIndex = 0;
    protected $employeeWorkSchedules           = [];
    protected $shiftMap                        = [];
    protected $nonWorkingDays                  = [];
    protected $holidayMap                      = [];
    protected $chronoLogMap                    = [];
    public $halfDayAbsentGracePeriod           = 60;

    /**
     * 
     * @param Payroll $payroll
     * @param Employee $employee
     * @returns \App\Models\HR\AttendanceSummary
     */
    public function generateAttendanceSummary(Payroll $payroll, Employee $employee) {

        $cutoffStart = new \DateTime($payroll->cutoff_start);
        $cutoffEnd   = new \DateTime($payroll->cutoff_end);
        $monthEnd    = clone $cutoffStart;

        $monthEnd->modify('+1 month');

        $interval = date_diff($monthEnd, $cutoffStart);
//        $interval = date_diff($cutoffEnd, $cutoffStart);
        $days     = $interval->format("%a");

        //  load possible work schedules of the employee that 
        $this->loadEmployeeWorkSchedules($employee, $cutoffStart);
        $this->loadShiftMap();
        $this->loadHolidays($cutoffStart, $cutoffEnd);
        $this->mapEmployeeChronoLog($employee, $payroll);

        $attendanceSummary = new AttendanceSummary();

        $runningDate = $cutoffStart;
        for ($i = 0; $i < $days; $i ++) {
            //  use get applicable work schedule to get the appropriate work schedule
            //  given the running date. employees may have different working schedules
            //  in the middle of their cutoff
            $workSchedule     = $this->getApplicableWorkSchedule($runningDate);
            $runningDayOfWeek = $runningDate->format("w") + 1;

            if ($workSchedule == null) {
                throw new NoWorkScheduleException($employee);
            }

            $shiftCode = $workSchedule["weekDayShiftMap"][$runningDayOfWeek];
            $shift     = $this->shiftMap[$shiftCode];

//            echo "{$shiftCode} - {$runningDate->format("Y-m-d")}, ";
            $workingDay = $this->getWorkingDayInfo($shift, clone $runningDate);

            //  do not count holidays as working month day or working cutoff day
            if ($workingDay["holiday"] && $workingDay["holiday"]["type"] == "REG") {
                $attendanceSummary->holiday_overtime ++;
            } else if ($workingDay["holiday"] && $workingDay["holiday"]["type"] == "SNW") {
                $attendanceSummary->special_holiday_overtime ++;
            } else if ($workingDay["working_day"]) {
                $attendanceSummary->month_days ++;

                if ($runningDate <= $cutoffEnd) {
                    $attendanceSummary->working_days ++;

                    if ($workingDay["present"]) {
                        $attendanceSummary->present++;
                        $attendanceSummary->late           += $workingDay["time_lates"];
                        $attendanceSummary->breaktime_late += $workingDay["time_breaktime_lates"];
                    } else {
                        $attendanceSummary->absent++;
                    }
                }
            }

            if ($runningDate <= $cutoffEnd) {
                array_push($attendanceSummary->workingDays, $workingDay);
            }

            $runningDate->modify('+1 day');
        }

        //  TODO: halfDayAbsences
        return $attendanceSummary;
    }

    /**
     * 
     * @param Employee $employee
     * @param DateTime $from
     * @param DateTime $to
     * @throws NoWorkScheduleException
     * @returns \App\Services\Report\AbsenceAndTardiness
     */
    public function getAbsenceAndTardines(Employee $employee, DateTime $from, DateTime $to) {
        $interval = date_diff($to, $from);
        $days     = $interval->format("%a");

        $this->loadEmployeeWorkSchedules($employee, $from);
        $this->loadShiftMap();
        $this->loadHolidays($from, $to);
        $this->mapEmployeeChronoLogBetweenDates($employee, $from, $to);

        $report           = new AbsenceAndTardiness();
        $report->employee = $employee;

        $runningDate = $from;
        for ($i = 0; $i < $days; $i ++) {
            //  use get applicable work schedule to get the appropriate work schedule
            //  given the running date. employees may have different working schedules
            //  in the middle of their cutoff
            $workSchedule     = $this->getApplicableWorkSchedule($runningDate);
            $runningDayOfWeek = $runningDate->format("w") + 1;

            if ($workSchedule == null) {
                throw new NoWorkScheduleException($employee);
            }

            $shiftCode = $workSchedule["weekDayShiftMap"][$runningDayOfWeek];
            $shift     = $this->shiftMap[$shiftCode];

//            echo "{$shiftCode} - {$runningDate->format("Y-m-d")}, ";
            $workingDay = $this->getWorkingDayInfo($shift, clone $runningDate);

            if ($workingDay["working_day"]) {
                $report->cutoffDays ++;

                $daySummary = [
                    "date"         => $runningDate->format("Y-m-d"),
                    "scheduled_in" => $workingDay["scheduled_in"],
                    "time_in"      => $workingDay["time_in"]
                ];

                if ($workingDay["present"]) {
                    $report->daysPresent++;
                    $daySummary["status"] = "Present";
                    $daySummary["late"]   = $workingDay["time_lates"];
                } else {
                    $daySummary["status"] = "Absent";
                }

                array_push($report->days, $daySummary);
            }

            $runningDate->modify('+1 day');
        }

        return $report;
    }

    private function getWorkingDayInfo(Shift $shift, DateTime $dayDate) {

        $dateKey = $dayDate->format("Y-m-d");
        $info    = ["date" => $dayDate];

        $info["working_day"] = $shift->code != AttendanceSummaryProcessorService::DAY_OFF_SHIFT_CODE;

        if (array_key_exists($dateKey, $this->holidayMap)) {
            $info["holiday"] = $this->holidayMap[$dateKey];
        } else {
            $info["holiday"] = NULL;
        }

        $info["scheduled_in"]         = $shift->scheduled_in;
        $info["scheduled_out"]        = $shift->scheduled_out;
        $info["time_in"]              = NULL;
        $info["time_out"]             = NULL;
        $info["time_lates"]           = 0;
        $info["time_breaktime_lates"] = 0;
        $info["present"]              = false;

        return $this->assignWorkingDayTimeInfo($info, $shift, $dateKey);
    }

    private function assignWorkingDayTimeInfo(&$info, Shift $shift, $dateKey) {

//        echo json_encode($this->chronoLogMap);
//        exit();

        if (array_key_exists($dateKey, $this->chronoLogMap)) {
            $chronoLogs = $this->chronoLogMap[$dateKey];

            foreach ($chronoLogs AS $chronoLog) {
                if ($chronoLog->entry_type == "IN") {
                    $info["time_in"] = $chronoLog->entry_time;
                } else if ($chronoLog->entry_type == "OUT") {
                    $info["present"]  = true;
                    $info["time_out"] = $chronoLog->entry_time;
                }
            }

            if ($info["time_in"] && $info["time_out"]) {
                $entryTime   = new DateTime($info["time_in"]);
                $outTime     = new DateTime($info["time_out"]);
                $scheduledIn = new DateTime($entryTime->format("Y-m-d") . " " . $shift->scheduled_in);

                if ($entryTime > $scheduledIn) {
                    $dateDiff           = $entryTime->diff($scheduledIn);
                    $info["time_lates"] = 60 - $dateDiff->i;
                }

                $totalTimeSpent = $outTime->diff($entryTime);
            }
        }

        return $info;
    }

    private function getApplicableWorkSchedule(DateTime $date) {

        //  for quicker search, start from the lastApplicableWorkScheduleIndex
        for ($i = $this->lastApplicableWorkScheduleIndex; $i < count($this->employeeWorkSchedules); $i ++) {
            $this->lastApplicableWorkScheduleIndex = $i;

            if ($this->employeeWorkSchedules[$i]->effective_date <= $date) {
                return $this->employeeWorkSchedules[$i];
            }
        }

        //  no work schedule found. if lastApplicableWorkScheduleIndex did not start from 0, search again but this time, start from 0.
        if ($this->lastApplicableWorkScheduleIndex > 0) {
            $this->lastApplicableWorkScheduleIndex = 0;
            return $this->getApplicableWorkSchedule($date);
        }
    }

    // <editor-fold defaultstate="collapsed" desc="Data Loaders & mappers">

    private function loadEmployeeWorkSchedules(Employee $employee, DateTime $lastDateApplicable) {
        $this->employeeWorkSchedules = WorkSchedule::AppliesToEmployeeBeforeDate($employee, $lastDateApplicable)->with('workScheduleShifts')->get();

        //  map work schedule shifts' day of week
        for ($i = 0; $i < count($this->employeeWorkSchedules); $i ++) {
            $map = [];
            foreach ($this->employeeWorkSchedules[$i]->workScheduleShifts AS $shift) {
                $map[$shift->week_day] = $shift->shift_code;
            }

            $this->employeeWorkSchedules[$i]->weekDayShiftMap = $map;
        }

        $this->lastApplicableWorkScheduleIndex = 0;
    }

    private function loadShiftMap() {

        $shiftCodesToQuery = [];

        foreach ($this->employeeWorkSchedules AS $workSchedule) {
            foreach ($workSchedule->workScheduleShifts AS $shift) {

                //  if this shift is not yet loaded and it's not a day off,
                //  put its id on the shift codes to query. This will be used
                //  for the query later
                if (!array_key_exists($shift->shift_code, $this->shiftMap)) {

                    //  this data will be overwritten later, this is just placeholder                   
                    array_push($shiftCodesToQuery, $shift->shift_code);
                }
            }
        }

        $shifts = Shift::whereIn("code", $shiftCodesToQuery)->with('breaks')->get();

        //  map the shifts
        foreach ($shifts AS $shift) {
            $this->shiftMap[$shift->code] = $shift;
        }
    }

    private function loadHolidays(DateTime $from, DateTime $to) {

        $regularHolidays           = Holiday::Regular()->FromMonthAndDay($from)->ToMonthAndDay($to)->get();
        $specialNonWorkingHolidays = Holiday::SpecialNonWorking()->from($from)->to($to)->get();

        $this->mapHolidays($regularHolidays, "REG");
        $this->mapHolidays($specialNonWorkingHolidays, "SNW");
    }

    private function mapHolidays($holidays, $type) {
        foreach ($holidays AS $holiday) {
            //  if the holiday has multiple dates
            if ($holiday->date_start != $holiday->date_end) {
                //  loop through the dates
                $runningDate = DateTime::createFromFormat("Y-m-d", $holiday->date_start);
                $dateEnd     = DateTime::createFromFormat("Y-m-d", $holiday->date_end);
                while ($runningDate <= $dateEnd) {
                    $this->holidayMap[$runningDate->format("Y-m-d")] = [
                        "type"         => $type,
                        "holiday_desc" => $holiday->description
                    ];

                    $runningDate->modify('+1 day');
                }
            } else {
                $this->holidayMap[$holiday->date_start] = [
                    "type"         => $type,
                    "holiday_desc" => $holiday->description
                ];
            }
        }
    }

    private function mapEmployeeChronoLog(Employee $employee, Payroll $payroll) {
        $this->mapEmployeeChronoLogBetweenDates($employee, new DateTime($payroll->cutoff_start), new DateTime($payroll->cutoff_end));
    }

    private function mapEmployeeChronoLogBetweenDates(Employee $employee, DateTime $from, DateTime $to) {
        $chronoLogs = $employee
                ->ChronoLog()
                ->BetweenDates($from, $to)
                ->orderBy("entry_time")
                ->get();

        foreach ($chronoLogs AS $log) {
            if (!array_key_exists($log->entry_date, $this->chronoLogMap)) {
                $this->chronoLogMap[$log->entry_date] = array();
            }

            array_push($this->chronoLogMap[$log->entry_date], $log);
        }
    }

    // </editor-fold>
}
