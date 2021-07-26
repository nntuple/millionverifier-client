<?php

namespace Ntuple\MillionverifierClient\VerifyEamail;

class Request {
    public $email = null;
    public $time_out = 10;

    static function fromArray(array $arr){
        $instance = new Request;
        $instance->email = $arr['email'] ?? null;
        $instance->time_out = $arr['time_out'] ?? 10;

        return $instance;
    }
}