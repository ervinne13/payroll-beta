<?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

/*
  |--------------------------------------------------------------------------
  | Web API
  |--------------------------------------------------------------------------
  |
  | API that are dependent on session instead of auth tokens
  |
 */

Route::group(['prefix' => '/hr', 'namespace' => 'Modules\HR'], function () {
    Route::get('employees/active', 'EmployeesController@allActiveJSON');
});
