<?php

use App\Models\HR\Employee;
use App\Models\Payroll\Payroll;
use App\Services\Payroll\TaxComputerService;

class TaxComputerTest extends TestCase {

    /**
     * A basic test example.
     * phpunit --filter testTaxDueComputation tests/TaxComputerTest.php
     * @return void
     */
    public function testTaxDueComputation() {
        $payroll = Payroll::find("2017-02-15");

        $taxComputer = new TaxComputerService();
        $taxComputer->getEstimatedEmployeeTaxDue(Employee::find("20170120001"), $payroll);
    }

}
