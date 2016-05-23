<?php namespace Codedge\Sofortlib;

use Illuminate\Support\Facades\Facade;

class RefundFacade extends Facade
{
    /**
     * Get the registered component name
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'refund';
    }
}