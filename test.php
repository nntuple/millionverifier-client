<?php

use Ntuple\MillionverifierClient\Client;
use Ntuple\MillionverifierClient\VerifyEmail\Request;
// use Ntuple\MillionverifierClient\CheckCredits\Response as CheckCreditRes;

require __DIR__ . '/vendor/autoload.php';

$client = new Client();

# use Constructor
$req = new Request;
$req->email = 'garam-park@naver.com';
$req->time_out = 10;

# use static factory method
$req = Request::fromArray([
    'email' => 'garam-park@naver.com',
    'time_out' => 10,
]);

$resp = $client->verifyEmail($req);

echo (json_encode($resp));


$resp = $client->checkCredits();

echo (json_encode($resp));
