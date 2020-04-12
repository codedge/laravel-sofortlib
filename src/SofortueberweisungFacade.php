<?php declare(strict_types=1);

namespace Codedge\Sofortlib;

use Illuminate\Support\Facades\Facade;

class SofortueberweisungFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sofortueberweisung';
    }
}
