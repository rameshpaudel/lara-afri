<?php

namespace App\Http\Middleware;

use Closure;
/**
* Set the locale automatically when the app is started
**/
class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->has('locale')){
            $locale = $request->session()->get('locale', Config::get('app.locale'));
        } else{
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'),0,2);
            if($locale !='fr' & $locale != 'en'){
                $locale = 'en';
            }
        }
        App::setLocale($locale);
        return $next($request);
    }
}
