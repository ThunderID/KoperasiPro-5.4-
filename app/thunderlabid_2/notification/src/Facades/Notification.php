<?php 

namespace Thunderlabid\Notification\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade Notification
 *
 * Digunakan untuk aliases fungsi static Notification.
 *
 * @package    Thunderlabid
 * @subpackage Notification
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Notification extends Facade 
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Notification'; // the IoC binding.
    }
}