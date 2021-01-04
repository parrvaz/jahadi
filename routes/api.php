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

        Route::middleware('admin')->prefix('user')->group(function () {
            Route::get('show', 'UserController@show');

        });

        Route::prefix('company')->group(function () {
            Route::get('show', 'CompanyController@show');

            Route::middleware('nCompany')->post('store', 'CompanyController@store');
            Route::middleware('hasCompany')->group(function () {
                Route::post('update', 'CompanyController@update');
                Route::post('delete', 'CompanyController@destroy');
                Route::get('edit', 'CompanyController@edit')->name('editCompany');

                Route::get('show/{company}', 'CompanyController@showSingle');


                Route::get('volunteer/show', 'VolunteerController@showPublic');
                Route::get('volunteer/show/{volunteer}', 'VolunteerController@showPublicSingle');



            });

        });


        Route::prefix('volunteer')->group(function () {

            Route::middleware('owner')->group(function (){
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

            Route::middleware('storeVolunteer')->post('store', 'VolunteerController@store');
            Route::get('show', 'VolunteerController@show');

        });


        Route::middleware('hasCompany')->prefix('group')->group(function () {
            Route::post('store', 'GroupController@store');
            Route::get('show', 'GroupController@show');
            Route::get('volunteer/show', 'GroupController@volunteerShow');
            Route::get('volunteer/show/{volunteer}', 'GroupController@volunteerShowSingle');

            Route::middleware('owner')->group(function () {
                Route::post('update/{group}', 'GroupController@update');

                Route::post('delete/{group}', 'GroupController@destroy');
                Route::get('show/{group}', 'GroupController@showSingle');
            });

        });


        Route::middleware('admin')->prefix('admin')->group(function () {
            Route::post('confirm/{company}', 'CompanyController@confirm');
            Route::post('unconfirmed/{company}', 'CompanyController@unconfirmed');

        });


    });

});


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
