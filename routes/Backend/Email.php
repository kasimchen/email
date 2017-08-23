<?php

Route::group([
    'prefix'     => 'email',
    'as'		 => 'email.',
    'namespace'  => 'Email',
], function() {

    Route::get('index', 'EmailController@index')->name('index');
    Route::get('show/{id}', 'EmailController@show')->name('show');
    Route::post('send/{id}', 'EmailController@send')->name('send');

    Route::get('synchro', 'EmailController@synchro')->name('synchro');




});