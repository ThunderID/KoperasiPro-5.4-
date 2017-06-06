<?php

namespace App\Http\Middleware\ACL;

use Closure, TAuth;
use Carbon\Carbon;

use Illuminate\Http\Request;

class KasHarianMiddleware
{
	public function handle(Request $request, Closure $next)
	{
		$e 		= TAuth::activeOffice();

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

		foreach ($e['scopes'] as $key => $value) 
		{
			if(str_is('kas_harian', $value['list']) && (!isset($value['expired_at']) || $value['expired_at'] > Carbon::now()->format('d/m/Y')))
			{
				return $next($request);
			}
		}

		return redirect(route('login.index'))->with('msg', ['danger' => ['Anda tidak memiliki akses']]);
	}
}