<?php declare(strict_types=1);

namespace Codedge\Sofortlib;

use Illuminate\Support\Facades\Facade;

class BillcodeFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billcode';
    }
}
