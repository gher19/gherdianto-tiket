<?php

namespace Gherdianto\Tiket;

/**
 * 
 * @package 	Gherdianto\Tiket
 * @version 	1.0
 * @author 		Gerry Herdianto
 *
 */

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use Gherdianto\Tiket\GeneralAPI;
use Gherdianto\Tiket\FlightAPI;

class GTiket
{
	public $generalAPI; 
	public $flightAPI; 

	function __construct()
	{
		$this->generalAPI = new GeneralAPI();
		$this->flightAPI = new FlightAPI();
	}

	/* General API */

	public function list_currency()
	{
		return $this->generalAPI->list_currency();
	}

	public function list_lang()
	{
		return $this->generalAPI->list_lang();
	}

	public function list_country()
	{
		return $this->generalAPI->list_country();
	}

	public function get_transaction_policies()
	{
		return $this->generalAPI->get_transaction_policies();
	}


	/* Flight API */

	public function search_airport()
	{
		return $this->flightAPI->search_airport();
	}

	public function get_popular_airport_destination()
	{
		return $this->flightAPI->get_popular_airport_destination();
	}

	public function get_nearest_airport($latitude, $longitude)
	{
		return $this->flightAPI->get_nearest_airport($latitude, $longitude);
	}

	public function search_flight($destination, $arrival, $date, $return_date, $adult, $child, $infant, $search_version)
	{
		return $this->flightAPI->search_flight($destination, $arrival, $date, $return_date, $adult, $child, $infant, $search_version);
	}

	public function check_update($destination, $arrival, $date, $adult, $child, $infant)
	{
		return $this->flightAPI->check_update($destination, $arrival, $date, $adult, $child, $infant);
	}

	public function get_flight_data($flight_id, $date, $ret_flight_id, $ret_date)
	{
		return $this->flightAPI->get_flight_data($flight_id, $date, $ret_flight_id, $ret_date);
	}
}