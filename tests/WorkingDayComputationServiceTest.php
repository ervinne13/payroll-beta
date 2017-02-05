<?php

use App\Models\HR\Employee;
use App\Models\HR\EmployeeWorkSchedule;
use App\Models\HR\Holiday;
use App\Models\Payroll\Payroll;
use App\Services\Payroll\WorkingDayComputationService;
use Illuminate\Support\Facades\Artisan;

class WorkingDayComputationServiceTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testWorkingDayComputationForMonthlyRegular() {
//        Artisan::call('db:seed', ["--class" => "TestWorkingDayComputation_HolidaySeeder"]);

        $payroll                  = Payroll::firstOrNew(["pay_period" => "2017-02-15"]);
        $payroll->cutoff_start    = DateTime::createFromFormat('Y-m-d', "2017-01-26");
        $payroll->cutoff_end      = DateTime::createFromFormat('Y-m-d', "2017-02-10");
        $payroll->next_pay_period = DateTime::createFromFormat('Y-m-d', "2017-03-01");

        $payroll->include_monthly_processable = true;

        $payroll->save();

//        $employee              = Employee::find("20170120001");
        $employee = Employee::find("20170120003");

        //  test one regular holiday, ranged
        $holiday                    = new Holiday();
        $holiday->code              = "01_30_Test01";
        $holiday->description       = "test regular holiday";
        $holiday->holiday_type_code = "REG";
        $holiday->date_start        = DateTime::createFromFormat('Y-m-d', "2017-01-30");
        $holiday->date_end          = DateTime::createFromFormat('Y-m-d', "2017-01-31");

        $holiday->save();

        //  test one special holiday
        $holiday2                    = new Holiday();
        $holiday2->code              = "02_01_Test02";
        $holiday2->description       = "test special holiday";
        $holiday2->holiday_type_code = "SNW";
        $holiday2->date_start        = DateTime::createFromFormat('Y-m-d', "2017-02-01");
        $holiday2->date_end          = DateTime::createFromFormat('Y-m-d', "2017-02-01");

        $holiday2->save();

        $workingDayComputationService = new WorkingDayComputationService();

        $workingDays = $workingDayComputationService->getWorkingDays($payroll, $employee);

        echo json_encode($workingDays);

        $this->assertTrue(true);
    }

}
