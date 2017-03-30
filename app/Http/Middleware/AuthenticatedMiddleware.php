<?php
namespace App\Http\Middleware;

use Closure, TAuth, Exception;
use Illuminate\Http\Request;

class AuthenticatedMiddleware
{
	public function handle($request, Closure $next)
	{
		$e 		= TAuth::isLogged();

		if($e instanceOf Exception)
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

		return $next($request);
	}
}