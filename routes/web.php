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

Route::get('/', function () {
    return view('welcome');
});

Route::get('starter', 'StarterController@index');
Route::get('computation-tables/philhealth', 'StarterController@index');

Route::group(['prefix' => '/', 'namespace' => 'Modules'], function () {
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
});

// <editor-fold defaultstate="collapsed" desc="HR Modules">

Route::group(['prefix' => '/', 'namespace' => 'Modules\HR'], function () {

    Route::get('policies/datatable', 'PoliciesController@datatable');
    Route::resource('policies', 'PoliciesController');

    Route::get('employees/datatable', 'EmployeesController@datatable');
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
//Route::group(['prefix' => 'payroll', 'namespace' => 'Modules\Payroll', 'middleware' => ['auth']], function () {
Route::group(['prefix' => 'payroll', 'namespace' => 'Modules\Payroll'], function () {
    Route::get('process', 'ProcessController@index');

    Route::get('items/datatable', 'PayrollItemsController@datatable');
    Route::resource('items', 'PayrollItemsController');
});

Route::group(['prefix' => 'security', 'namespace' => 'Modules\Security'], function () {

    Route::get('users/datatable', 'UsersController@datatable');
    Route::resource('users', 'UsersController');
});