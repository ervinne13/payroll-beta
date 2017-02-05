<?php

use App\Models\HR\Holiday;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class=SampleHolidaysSeeder
 */
class SampleHolidaysSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
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
    }

}
