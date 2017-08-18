<?php

Route::group([
	'prefix'     => 'user',
	'as'		 => 'user.',
	'namespace'  => 'User',
], function() {


	Route::get('index', 'UserController@index')->name('index');
    Route::get('profile/{id}', 'UserController@profile')->name('profile');
    Route::post('updateProfile/{id}', 'UserController@updateProfile')->name('updateProfile');






});