# Millionverifier API Client

PHP Client for Millionverifier APIs.

## example

``` php
use Ntuple\MillionverifierClient\Client;
use Ntuple\MillionverifierClient\VerifyEamail\Request;

# you api key
$api_key = 'API_KEY_FOR_TEST';

client = new Client($api_key);

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

```
