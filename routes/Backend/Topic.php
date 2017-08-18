<?php

Route::group([
	'prefix'     => 'topic',
	'as'		 => 'topic.',
	'namespace'  => 'Topic',
], function() {


	Route::get('index', 'TopicController@index')->name('index');




});