<?php

namespace Ntuple\MillionverifierClient;

use Ntuple\MillionverifierClient\Exceptions\EmailsRequiredException;
use Ntuple\MillionverifierClient\CheckCredits\Response as CheckCreditsResponse;
use Ntuple\MillionverifierClient\VerifyEmail\Request as VerifyEmailRequest;
use Ntuple\MillionverifierClient\VerifyEmail\Response as VerifyEmailResponse;

class Client
{

    protected $api_key;

    public function __construct(string $api_key = 'API_KEY_FOR_TEST')
    {
        $this->api_key = $api_key;
    }

    public function verifyEmail(VerifyEmailRequest $request)
    {
        $curl = curl_init();

        $api_key = $this->api_key;
        $time_out = $request->time_out;
        $email = $request->email;

        if (!$request->email)
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
        return VerifyEmailResponse::fromArray($array);
    }

    public function checkCredits()
    {
        $curl = curl_init();
        $api_key = $this->api_key;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.millionverifier.com/api/v3/credits?api=$api_key",
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
        return CheckCreditsResponse::fromArray($array);
    }
}
