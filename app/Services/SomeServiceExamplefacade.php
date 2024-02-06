<?php

namespace App\Services;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string doSomething()
 */

class SomeServiceExampleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SomeService';
    }
}
