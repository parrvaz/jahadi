<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->namespace('Api\v1')->group(function () {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::middleware('auth:api')->group(function () {

        Route::prefix('company')->group(function () {
            Route::middleware('nCompany')->post('store', 'CompanyController@store');
            Route::post('update', 'CompanyController@update');
            Route::post('delete', 'CompanyController@destroy');
            Route::get('edit', 'CompanyController@edit')->name('editCompany');

            Route::get('show/{company}', 'CompanyController@showSingle');
        });


        Route::prefix('volunteer')->group(function () {

            Route::middleware('ownerVolunteer')->group(function (){
                Route::post('update/{volunteer}', 'VolunteerController@update');
                Route::post('delete/{volunteer}', 'VolunteerController@destroy');
                Route::get('show/{volunteer}', 'VolunteerController@showSingle');

                Route::prefix('activity')->group(function () {
                    Route::post('update/{activity}', 'ActivityController@update');
                    Route::post('delete/{activity}', 'ActivityController@destroy');
                    Route::post('store/{volunteer}', 'ActivityController@store');
                    Route::get('show/{volunteer}', 'ActivityController@show');
                });

            });
            Route::post('store', 'VolunteerController@store');
            Route::get('show', 'VolunteerController@show');
        });



    });

});


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
