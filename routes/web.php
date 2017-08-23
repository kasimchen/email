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


Route::group([
    'as'		 => 'auth.',
    'namespace'  => 'Auth',
], function() {


    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');

    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register')->name('register');


});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::post('common/upload', 'CommonController@upload')->name('upload');


Route::group(['namespace' => 'Backend'], function () {
    /**
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    includeRouteFiles(__DIR__ . '/Backend/');
});

