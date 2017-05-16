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

class GeneralAPI extends BaseAPI
{
	/**
	* Get List Currency
	*
	* @return object
	* @throws ClientException
	*/

	public function list_currency()
	{
		$method = 'GET';
		$param = [];
		$uri = Config::get('gtiket.list_currency');

		$response = parent::request($method, $uri, $param);

		$data = json_decode($response);

		return (object) $data;
	}

	/**
	* Get List Lang
	*
	* @return object
	* @throws ClientException
	*/

	public function list_lang()
	{
		$method = 'GET';
		$param = [];
		$uri = Config::get('gtiket.list_lang');

		$response = parent::request($method, $uri, $param);

		$data = json_decode($response);

		return (object) $data;
	}

	/**
	* Get List Country
	*
	* @return object
	* @throws ClientException
	*/

	public function list_country()
	{
		$method = 'GET';
		$param = [];
		$uri = Config::get('gtiket.list_country');

		$response = parent::request($method, $uri, $param);

		$data = json_decode($response);

		return (object) $data;
	}

	/**
	* Get Transaction Policies
	*
	* @return object
	* @throws ClientException
	*/

	public function get_transaction_policies()
	{
		$method = 'GET';
		$param = [];
		$uri = Config::get('gtiket.get_transaction_policies');

		$response = parent::request($method, $uri, $param);

		$data = json_decode($response);

		return (object) $data;
	}
}