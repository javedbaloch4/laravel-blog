<?php

namespace App\Billing;

class JavaAcme
{
    protected $encode;

    public function __construct($encode) {
        $this->encode = $encode;
    }
}