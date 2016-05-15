<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if ($request->user()->hasRole('admin')) {
			return redirect()->action('UserVerifyController@admin');
		} else if ($request->user()->hasRole('business')) {
			return redirect()->action('UserVerifyController@business');
			//redirect to the business profile
		} elseif ($request->user()->hasRole('personal')) {
			return redirect()->action('UserVerifyController@business');
			//redirect to the personal profile
		}
		return $next($request);
	}
}
