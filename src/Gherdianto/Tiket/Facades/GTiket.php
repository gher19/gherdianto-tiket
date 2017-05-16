<?php

namespace Gherdianto\Tiket\Facades;

use Illuminate\Support\Facades\Facade;

class GTiket extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'gtiket';
    }
}
