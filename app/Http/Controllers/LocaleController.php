<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Stevebauman\Translation\Facades\Translation;

/**
 * Class LocaleController
 * @package App\Http\Controllers
 */
class LocaleController extends Controller
{

	/**
	 * @param $lang
	 * @return \Illuminate\Http\JsonResponse
     */
	public function switchLanguage($lang)
	{
		$locale = $lang;
		Translation::setLocale($locale);
		App::setLocale($locale);
		//Using cache instead of session for the api
		Cache::forever('locale', $lang);


		$data = [
			'status' => 200,
			'message' => 'Switched language to '.$locale,
			'locale' => $locale,
			'session' => session()->get('locale'),
		];
		return response()->json( $data );
	}

	/**
	 * @param $lang
	 * @return \Illuminate\Http\RedirectResponse
     */
	public function webSwitchLanguage($lang)
	{
		$locale = $lang;
		Translation::setLocale($locale);
		App::setLocale($locale);
		//Using cache instead of session for the api
		Cache::forever('locale', $lang);
		return redirect()->back();
		
	}

	/**
	 *
     */
	public function getAll(){
		$conf = config('translation.locale');
		dd($conf);
	}
}
