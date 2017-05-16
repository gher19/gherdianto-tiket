<?php

Route::group(['prefix' => 'general'], function(){

	Route::get('/policies', function () {
	    return dd(GTiket::get_transaction_policies());
	});

	Route::get('/currency', function () {
	    return dd(GTiket::list_currency());
	});

	Route::get('/country', function () {
	    return dd(GTiket::list_country());
	});

	Route::get('/lang', function () {
	    return dd(GTiket::list_lang());
	});

});

Route::group(['prefix' => 'flight'], function(){

	Route::get('/airport', function () {
	    return dd(GTiket::search_airport());
	});

	Route::get('/airport/popular', function () {
	    return dd(GTiket::get_popular_airport_destination());
	});

	Route::get('/airport/nearest', function () {
	    return dd(GTiket::get_nearest_airport(-6.919827, 107.603953));
	});

	Route::get('/search', function () {
	    return dd(GTiket::search_flight(
	    	'CGK',
	    	'DPS',
	    	date("Y-m-d", strtotime("+1 day")),
	    	date("Y-m-d", strtotime("+3 day")),
	    	1,
	    	null,
	    	null,
	    	1
	    ));
	});

	Route::get('/search/update', function () {
	    return dd(GTiket::check_update(
	    	'CGK',
	    	'DPS',
	    	date("Y-m-d", strtotime("+1 day")),
	    	1,
	    	null,
	    	null
	    ));
	});

	Route::get('/data/{flight_id}', function ($flight_id) {
	    return dd(GTiket::get_flight_data(
	    	$flight_id,
	    	date("Y-m-d", strtotime("+1 day")),
	    	null,
	    	null
	    ));
	});

});

