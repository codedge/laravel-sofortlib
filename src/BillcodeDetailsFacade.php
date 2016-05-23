<?php namespace Codedge\Sofortlib;

use Illuminate\Support\Facades\Facade;

/**
 * @see Codedge\Sofortlib\BillcodeDetails
 * @package Codedge\Sofortlib
 */
class BillcodeDetailsFacade extends Facade
{
    /**
     * Get the registered component name
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'billcodedetails';
    }
}