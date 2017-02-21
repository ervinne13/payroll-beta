<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::auth();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return redirect('payroll/process');
});

Route::get('computation-tables/philhealth', 'StarterController@index');

//
/* * ************************************************************************* */
// <editor-fold defaultstate="collapsed" desc="Main Routes">

Route::group(['prefix' => '/', 'namespace' => 'Modules', 'middleware' => ['auth']], function () {
    Route::get('modules/datatable', 'ModulesController@datatable');
    Route::resource('modules', 'ModulesController');

    Route::get('number-series/datatable', 'NumberSeriesController@datatable');
    Route::resource('number-series', 'NumberSeriesController');

    Route::get('companies/datatable', 'CompaniesController@datatable');
    Route::resource('companies', 'CompaniesController');

    Route::get('positions/datatable', 'PositionsController@datatable');
    Route::resource('positions', 'PositionsController');

    Route::get('locations/datatable', 'LocationsController@datatable');
    Route::resource('locations', 'LocationsController');

    Route::get('computation-tables/{type}', 'Payroll\ComputationTablesController@index');
});

// </editor-fold>

/* * ************************************************************************* */
// <editor-fold defaultstate="collapsed" desc="HR Modules">

Route::group(['prefix' => '/hr', 'namespace' => 'Modules\HR', 'middleware' => ['auth']], function () {

    Route::get('policies/{policyCode}/employee/{employeeId}', 'PoliciesController@employeePolicy');
    Route::get('policies/datatable', 'PoliciesController@datatable');
    Route::resource('policies', 'PoliciesController');

    Route::get('employees/datatable', 'EmployeesController@datatable');
    Route::delete('employees/{employeeId}/work-schedule/{workScheduleEffectiveDate}', 'EmployeesController@destroyEmployeeWorkSchedule');
    Route::resource('employees', 'EmployeesController');

    Route::get('holidays/datatable', 'HolidaysController@datatable');
    Route::resource('holidays', 'HolidaysController');

    Route::get('tax-categories/datatable', 'TaxCategoriesController@datatable');
    Route::resource('tax-categories', 'TaxCategoriesController');

    Route::get('shifts/datatable', 'ShiftsController@datatable');
    Route::resource('shifts', 'ShiftsController');

    Route::get('shift-breaks/datatable', 'ShiftBreaksController@datatable');
    Route::resource('shift-breaks', 'ShiftBreaksController');

    Route::get('work-schedules/datatable', 'WorkSchedulesController@datatable');
    Route::resource('work-schedules', 'WorkSchedulesController');
});

// </editor-fold>

/* * ************************************************************************* */
// <editor-fold defaultstate="collapsed" desc="comment">

Route::group(['prefix' => 'timekeeping', 'namespace' => 'Modules\Timekeeping', 'middleware' => ['auth']], function () {

    Route::get('employees/datatable', 'EmployeesController@datatable');
    Route::get('employees/{employeeCode}/chronolog/datatable', 'EmployeesController@chronologDatatable');
    Route::resource('employees', 'EmployeesController');
});

// </editor-fold>

/* * ************************************************************************* */
// <editor-fold defaultstate="collapsed" desc="Payroll">

Route::group(['prefix' => 'payroll', 'namespace' => 'Modules\Payroll', 'middleware' => ['auth']], function () {
    Route::get('process', 'ProcessController@index');
    Route::get('process/{employeeCode}/period/{payPeriod}', 'ProcessController@processEmployee');

    Route::get('employee/{employeeCode}/payroll-items-amount', 'EmployeePayrollItemsAmountController@index');

    Route::get('entries/{employeeCode}/period/{payPeriod}/json', 'PayrollEntriesController@entriesJSON');
    Route::get('entries/{employeeCode}/period/{payPeriod}/datatable', 'PayrollEntriesController@datatable');
    Route::resource('entries', 'PayrollEntriesController');

    Route::get('items/datatable', 'PayrollItemsController@datatable');
    Route::resource('items', 'PayrollItemsController');

    Route::resource('payroll', 'PayrollController');
});

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="Reports">

Route::group(['prefix' => 'reports', 'namespace' => 'Modules\Reports', 'middleware' => ['auth']], function () {

    Route::get('payslip', 'PayslipController@index');
    Route::get('payslip/{employeeCode}/period/{payPeriod}', 'PayslipController@employee');
});
// </editor-fold>


/* * ************************************************************************* */
// <editor-fold defaultstate="collapsed" desc="Security">

Route::group(['prefix' => 'security', 'namespace' => 'Modules\Security', 'middleware' => ['auth']], function () {

    Route::get('users/datatable', 'UsersController@datatable');
    Route::resource('users', 'UsersController');
});

// </editor-fold>

Auth::routes();
