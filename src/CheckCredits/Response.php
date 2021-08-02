<?php

namespace Ntuple\MillionverifierClient\CheckCredits;

class Response
{

    public $credits;
    public $bulk_credits;
    public $renewing_credits;
    public $plan;

    static function fromArray(array $arr)
    {

        $instance = new self;
        $instance->credits = $arr['credits'] ?? 0;
        $instance->bulk_credits = $arr['bulk_credits'] ?? 0;
        $instance->renewing_credits = $arr['renewing_credits'] ?? 0;
        $instance->plan = $arr['plan'] ?? 0;

        return $instance;
    }
}
