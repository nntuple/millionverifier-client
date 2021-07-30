<?php

namespace Ntuple\MillionverifierClient\VerifyEamail;

class Response
{
    public $email;
    public $result;
    public $resultcode;
    public $subresult;
    public $free;
    public $role;
    public $didyoumean;
    public $credits;
    public $executiontime;
    public $error;
    public $livemode;

    static function fromArray(array $arr)
    {

        $instance = new self;
        $instance->email = $arr['email'] ?? "";
        $instance->result = $arr['result'] ?? "";
        $instance->resultcode = $arr['resultcode'] ?? 5;
        $instance->subresult = $arr['subresult'] ?? "unknown";
        $instance->free = $arr['free'] ?? false;
        $instance->role = $arr['role'] ?? false;
        $instance->didyoumean = $arr['didyoumean'] ?? "";
        $instance->credits = $arr['credits'] ?? 0;
        $instance->executiontime = $arr['executiontime'] ?? -1;
        $instance->error = $arr['error'] ?? "";
        $instance->livemode = $arr['livemode'] ?? false;

        return $instance;
    }
}
