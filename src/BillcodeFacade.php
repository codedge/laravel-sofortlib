<?php namespace Codedge\Sofortlib;

use Illuminate\Support\Facades\Facade;

/**
 * @see Sofortlib\Billcode
 */
class BillcodeFacade extends Facade
{
    /**
     * Get the registered component name
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'billcode';
    }


}