<?php
	
return [

	/*
		General Setting
	*/

	'base_url' => 'https://%s.tiket.com',
	'api_type' => 'api-sandbox',
	'secret_key' => '2a055d4ed8b741f00cbbcc44c862977b',
	'confirm_key' => '4820eb',
	'response_type' => 'json',
	'verify' => false,

	/* API URI */

	//------ General API
	'get_token' => 'apiv1/payexpress',
	'list_currency' => 'general_api/listCurrency',
	'list_lang' => 'general_api/listLanguage',
	'list_country' => 'general_api/listCountry',
	'get_transaction_policies' => 'general_api/getPolicies',

	//------- Flight API 
	'search_version' => 3,
	'search_flight' => 'search/flight',
	'search_airport' => 'flight_api/all_airport',
	'get_popular_airport_destination' => 'flight_api/getPopularDestination',
	'get_nearest_airport' => 'flight_api/getNearestAirport',
	'check_update' => 'ajax/mCheckFlightUpdated',
	'get_flight_data' => 'flight_api/get_flight_data',
	// Lion Only
	'get_lion_captcha' => 'flight_api/getLionCaptcha',

];