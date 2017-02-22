<?php 

namespace Thunderlabid\Credit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade Credit
 *
 * Digunakan untuk aliases fungsi static Credit.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Credit extends Facade 
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Credit'; // the IoC binding.
    }
}