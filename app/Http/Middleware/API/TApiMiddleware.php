<?php

namespace App\Http\Middleware\API;

use Closure;
use Illuminate\Http\Request;

class TApiMiddleware
{
	public function handle($request, Closure $next)
	{
		try
		{
			$header 		= explode(' ', $request->header('Authorization'));
			$decoder 		= base64_decode($header[1]);

			list($credentials['key'], $credentials['salt'], $credentials['secret']) 	= array_map('trim', explode('::', $decoder));
			
			$logged			= new APIAuthenticator;
			$logged->authenticating($credentials);

			return $next($request);
		}
		catch(Exception $e)
		{
			throw $e;
		}

	}
}