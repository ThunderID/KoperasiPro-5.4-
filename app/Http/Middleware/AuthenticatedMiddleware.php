<?php
namespace App\Http\Middleware;

use Closure, TAuth, Exception, Route, Session;
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

		if($request->has('password') || str_is(Route::currentRouteName(), 'credit.status'))
		{
			Session::flush();
			
			$logged = TAuth::loggedUser();

			$e2 	= TAuth::login(['nip' => $logged['nip'], 'password' => $request->get('password')]);

			if($e2 instanceOf Exception)
			{
				Session::flush();

				if(is_array($e2->getMessage()))
				{
					return redirect(route('login.index'))->with('msg', ['danger' => $e2->getMessage()]);
				}
				else
				{
					return redirect(route('login.index'))->with('msg', ['danger' => [$e2->getMessage()]]);
				}
			}
		}

		return $next($request);
	}
}