<?php

namespace Ntuple\MillionverifierClient;

use Ntuple\MillionverifierClient\Exceptions\EmailsRequiredException;
use Ntuple\MillionverifierClient\VerifyEamail\Request;
use Ntuple\MillionverifierClient\VerifyEamail\Response;

class Client {

    protected $api_key;
    
    public function __construct(string $api_key = 'API_KEY_FOR_TEST') {
        $this->api_key = $api_key;
    }

    public function verifyEmail(Request $request)
    {
        $curl = curl_init();

        $api_key = $this->api_key;
        $time_out = $request->time_out;
        $email = $request->email;

        if(!$request->email)
            throw new EmailsRequiredException();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.millionverifier.com/api/v3/?api=$api_key&email=$email&timeout=$time_out",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        $array = json_decode($response, true);
        return Response::fromArray($array);
    }

}