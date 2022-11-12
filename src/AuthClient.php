<?php

namespace App;

use GuzzleHttp\Client;

define('STRAPI_API_BASE_URL', 'http://localhost:1337/api/');

class AuthClient
{
	protected $client;

	public function __construct()
	{
		$this->client = new Client([
			'base_uri' => STRAPI_API_BASE_URL,
			'headers' => [
				'Accept' => 'application/json',
				'Content-Type' => 'application/json'
			]
		]);
	}

	public function register($username, $email, $password)
	{
		$registration_header = 'auth/local/register'; // ????
		return $this->client->post($registration_header, [
			'json' => [
                'username' => $username,
                'email' => $email,
                'password' => $password

            ] // supply the data here
		]);
	}

	public function login($identifier, $password)
	{
		$login_header = 'auth/local'; // ????
		return $this->client->post($login_header, [
			'json' => [
                'identifier' => $identifier,
                'password' => $password
            ] // supply the data here
		]);
	}
}