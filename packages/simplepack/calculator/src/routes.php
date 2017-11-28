<?php

Route::get('/calculator', function() {
	
	return 'this is test package';
});

Route::get('/calculator/add/{a}/{b}', 'Simplepack\Calculator\CalculatorController@add');

Route::get('/calculator/subtract/{a}/{b}', 'Simplepack\Calculator\CalculatorController@subtract');