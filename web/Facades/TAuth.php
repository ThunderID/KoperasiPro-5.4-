<?php 

namespace Thunderlabid\Application\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade TAuth
 *
 * Digunakan untuk aliases fungsi static Credit.
 *
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class TAuth extends Facade 
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'TAuth'; // the IoC binding.
    }
}