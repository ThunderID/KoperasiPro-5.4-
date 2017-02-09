<?php 

namespace App\Web\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade Credit
 *
 * Digunakan untuk aliases fungsi static Credit.
 *
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class TCredit extends Facade 
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'TCredit'; // the IoC binding.
    }
}