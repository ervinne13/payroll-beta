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

//Route::group(['prefix' => 'payroll', 'namespace' => 'Modules\Payroll', 'middleware' => ['auth']], function () {
Route::group(['prefix' => 'payroll', 'namespace' => 'Modules\Payroll'], function () {

    Route::get('process', 'ProcessController@index');
});
