<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Web\Services\TAuth;

class AuthenticatedMiddleware
{
	public function handle($request, Closure $next)
	{
		try
		{
			TAuth::isLogged();

			return $next($request);
		}
		catch(Exception $e)
		{
			if(is_array($e->getMessage()))
			{
				return redirect(route('login.index'))->with('msg', ['danger' => $e->getMessage()]);
			}
			else
			{
				return redirect(route('login.index'))->with('msg', ['danger' => [$e->getMessage()]]);
			}
		}

	}
}