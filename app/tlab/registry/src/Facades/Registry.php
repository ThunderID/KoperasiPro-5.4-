<?php 

namespace Thunderlabid\Registry\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade Registry
 *
 * Digunakan untuk aliases fungsi static Registry.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Registry extends Facade 
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Registry'; // the IoC binding.
    }
}