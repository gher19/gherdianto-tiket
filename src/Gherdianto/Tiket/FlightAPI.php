<?php

namespace Gherdianto\Tiket;

/**
 * 
 * @package 	Gherdianto\Tiket
 * @version 	1.0
 * @author 		Gerry Herdianto
 *
 */

use Illuminate\Support\Facades\Config;
use Gherdianto\Tiket\BaseAPI;

class FlightAPI extends BaseAPI
{
	/**
	* Search Airport
	*
	* @return object
	* @throws ClientException
	*/

	public function search_airport()
	{
		$method = 'GET';
		$param = [];
		$uri = Config::get('gtiket.search_airport');

		$response = parent::request($method, $uri, $param);

		$data = json_decode($response);

		return (object) $data;
	}

	/**
	* Get Popular Airport
	*
	* @return object
	* @throws ClientException
	*/

	public function get_popular_airport_destination()
	{
		$method = 'GET';
		$param = [];
		$uri = Config::get('gtiket.get_popular_airport_destination');

		$response = parent::request($method, $uri, $param);

		$data = json_decode($response);

		return (object) $data;
	}

	/**
	* Get Popular Airport
	*
	* @return object
	* @param latitude
	* @param longitude
	* @throws ClientException
	*/

	public function get_nearest_airport($latitude, $longitude)
	{
		$method = 'GET';
		$param = [
			'query' => [
				'latitude' => $latitude,
				'longitude' => $longitude,
			]
		];
		$uri = Config::get('gtiket.get_nearest_airport');

		$response = parent::request($method, $uri, $param);

		$data = json_decode($response);

		return (object) $data;
	}

	/**
	* Search Flight
	*
	* @param $destination
	* @param $arrival
	* @param $date
	* @param $return_date
	* @param $adult
	* @param $child
	* @param $infant
	* @param $search_version
	* @return object
	* @throws ClientException
	*/

	public function search_flight($destination, $arrival, $date, $return_date = null, $adult = null, $child = null, $infant = null, $search_version = null)
	{
		$method = 'GET';
		$param = [
			'query' => [
				'd' => $destination,
				'a' => $arrival,
				'date' => $date,
				'ret_date' => $return_date,
				'adult' => $adult,
				'child' => $child,
				'infant' => $infant,
				'v' => $search_version,
			]
		];
		$uri = Config::get('gtiket.search_flight');

		$response = parent::request($method, $uri, $param);

		$data = json_decode($response);

		return (object) $data;
	}	

	/**
	* Check Update Search Flight
	*
	* @param $destination
	* @param $arrival
	* @param $date
	* @param $adult
	* @param $child
	* @param $infant
	* @return object
	* @throws ClientException
	*/

	public function check_update($destination, $arrival, $date, $adult = null, $child = null, $infant = null)
	{
		$method = 'GET';
		$param = [
			'query' => [
				'd' => $destination,
				'a' => $arrival,
				'date' => $date,
				'adult' => $adult,
				'child' => $child,
				'infant' => $infant,
				'time' => time(),
			]
		];
		$uri = Config::get('gtiket.check_update');

		$response = parent::request($method, $uri, $param);

		$data = json_decode($response);

		return (object) $data;
	}	

	/**
	* Get Flight Data
	*
	* @param $flight_id
	* @param $date
	* @param $ret_flight_id
	* @param $ret_date
	* @return object
	* @throws ClientException
	*/

	public function get_flight_data($flight_id, $date, $ret_flight_id = null, $ret_date = null)
	{
		$method = 'GET';
		$param = [
			'query' => [
				'flight_id' => $flight_id,
				'date' => $date,
				'ret_flight_id' => $ret_flight_id,
				'ret_date' => $ret_date,
			]
		];
		$uri = Config::get('gtiket.get_flight_data');

		$response = parent::request($method, $uri, $param);

		$data = json_decode($response);

		return (object) $data;
	}	
}