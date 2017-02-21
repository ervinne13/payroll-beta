<?php

use App\Services\Payroll\TaxComputerService;

class TaxComputerTest extends TestCase {

    /**
     * A basic test example.
     * phpunit --filter testTaxDueComputation tests/TaxComputerTest.php
     * @return void
     */
    public function testTaxDueComputation() {
        $taxComputer = new TaxComputerService();
    }

}
