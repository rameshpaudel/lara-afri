<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */




Route::group( ['middleware' => ['throttle'] ],  function() {
	Route::auth();

	Route::get('api/locale/{switch}','LocaleController@switchLanguage');
	Route::get('locale/{switch}','LocaleController@webSwitchLanguage');
	Route::get('locale','LocaleController@getAll');

	Route::post('tag-subscribe', 'TagsSubscriptionController@subscribe');
	Route::get('tag-posts','PostsController@getByTag');
	//Route::post('watchtower/tag-feed', 'PostsController@feed');

	Route::get('tag-feed', 'PostsController@feed');

	Route::get('/', function () {
		return view('welcome');
	});
	Route::get('/home', 'HomeController@index');
	Route::get('/user-roles','UserVerifyController@listUserRoles');

	//Route::get('list-users','UserVerifyController@addRolesToUser');
	Route::post('list-users','UserVerifyController@attachUsersToRoles');

	Route::get('/personal', 'UserVerifyController@personal');
	Route::get('/business', 'UserVerifyController@business');
	Route::get('/admin', 'UserVerifyController@admin');

	Route::post('/personal-account','UserRegistrationController@registerPersonalAccount');
	Route::post('/business-account','UserRegistrationController@registerBusinessAccount');

	Route::get('profile/{id}','ProfilesController@index');
	Route::get('profile','ProfilesController@myProfile');
	
	/*
	Route::post('permission-roles','UserVerifyController@attachPermissionToRoles');
	Route::get('permission-roles','UserVerifyController@listPermissionRoles');
	*/

	Route::get('admin/verify-users','UserVerifyController@approve');

	Route::resource('watchtower/posts',PostsController::class);
	Route::resource('tags', TagsSubscriptionController::class);
	Route::resource('watchtower/uploads',UploadsController::class);
});


/*
 * API
 * */

Route::group(['prefix' => 'api/v1','middleware' => ['throttle:30,1']], function () {

	Route::resource('user',UserController::class);
	Route::resource('roles', RolesController::class);
	Route::resource('permissions', PermissionController::class);
	Route::resource('uploads',UploadsController::class);

	Route::get('/auth/token', function(){
		return csrf_token();
	});
	Route::post('register/personal-account','UserRegistrationController@registerPersonalAccount');
	Route::post('register/business-account','UserRegistrationController@registerBusinessAccount');

	Route::resource('posts', PostsController::class);
	Route::resource('tags', TagsSubscriptionController::class);

	/*
	FOR JWT AUTHENTICATION SYSTEM
	
	Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
	Route::post('authenticate', 'AuthenticateController@authenticate');
	*/

});

Route::group(['prefix' => Translation::getRoutePrefix() , 'middleware' => ['locale']] , function(){

	Route::resource('lang/posts', PostsController::class);
});

Route::post('/post-me',function(\Illuminate\Http\Request $request){
	$data = ['status' => 200, $request];


	return response()->json($request)->header('Access-Control-Allow-Origin:',' *');;
});