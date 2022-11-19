<?php

include "vendor/autoload.php";

use App\AuthClient;

$client = new AuthClient();

$identifier = $_POST ['identifier'];
$password = $_POST ['password'];

$result = $client->login($identifier, $password);

$body = $result->getBody()->getContents();
$decoded_response = json_decode($body);
$info = $decoded_response->user;
$username = $info->username;
$email = $info->email;

header('Location: login-success.php?username=' . $username . '&email=' . $email);