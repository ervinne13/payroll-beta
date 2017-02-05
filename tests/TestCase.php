<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as LaravelTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends LaravelTestCase {

    use WithoutMiddleware;
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication() {
//        putenv('DB_DEFAULT=payroll_test');
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

//        Artisan::call('migrate:reset');
//        $this->expectOutputString("migration reset");
//        Artisan::call('db:seed');
//        $this->expectOutputString("database seeded");

        return $app;
    }

}
