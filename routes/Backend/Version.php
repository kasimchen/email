<?php

Route::group([
    'prefix'     => 'version',
    'as'		 => 'version.',
    'namespace'  => 'Version',
], function() {

    Route::get('index', 'VersionController@index')->name('index');
    Route::get('show/{id}', 'VersionController@show')->name('show');
    Route::get('edit/{id}', 'VersionController@edit')->name('edit');
    Route::get('create', 'VersionController@create')->name('create');
    Route::post('update/{id}', 'VersionController@update')->name('update');
    Route::post('store', 'VersionController@store')->name('store');
    Route::delete('del/{id}', 'VersionController@del')->name('del');



});