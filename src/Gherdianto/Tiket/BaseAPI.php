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
use GuzzleHttp\Exception\ClientException;
use Gherdianto\Tiket\GTiketException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;

class BaseAPI
{
	protected $client;

	function __construct()
	{
		$client_config = [
			'base_uri' => sprintf(Config::get('gtiket.base_url'), Config::get('gtiket.api_type'))
		];
		
		$this->client = new Client($client_config);
	}

	/**
	* Request token from server
	*
	* @return string
	* @throws ClientException
	*/
	private function request_token()
	{
		$param = [
			'verify' => Config::get('gtiket.verify'),
			'query' => [
				'method' => 'getToken',
				'secretkey' => Config::get('gtiket.secret_key'),
				'output' => Config::get('gtiket.response_type'),
			]
		];

		$response = null;

		try{
			$response = $this->client->request('GET', Config::get('gtiket.get_token'), $param);
		}catch (ClientException $e) {
            //throw new ClientException($e);
            dd($e);
        }

		return $response->getBody()->getContents();
	}


	/**
	* get token string
	*
	* @return string
	*/
	public function get_token()
	{
        $token = Cookie::get('token');
        
        //if(true){
        if($token === null){
            $result = json_decode($this->request_token(), true);
            $token = $result['token'];

            Cookie::queue('token', $token, 30);
        }
        
        return (string) $token;
	}

	/**
	* send request to server
	*
	* @param $method
	* @param $uri
	* @param $param
	* @return string
	*/
	protected function request($method, $uri, array $param)
	{
		$param['verify'] = Config::get('gtiket.verify');
		$param['query']['output'] = Config::get('gtiket.response_type');
        $param['query']['token'] = self::get_token();

		$response = null;

		try{
			$response = $this->client->request($method, $uri, $param);
		}catch (ClientException $e) {
            //throw new ClientException($e);
            dd($e);
        }	

        return $response->getBody()->getContents();	
	}
}