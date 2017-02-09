<?php 

namespace App\Web\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade Navbar
 *
 * Digunakan untuk aliases fungsi static Navbar.
 *
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class TNavbar extends Facade 
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'TNavbar'; // the IoC binding.
    }
}