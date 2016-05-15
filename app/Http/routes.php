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



Route::group(['middleware' => ['throttle']],  function() {
	Route::resource('watchtower/uploads',UploadsController::class);
	Route::get('tag-posts','PostsController@getByTag');
	Route::resource('watchtower/posts',PostsController::class);
	Route::resource('watchtower/tags', TagsSubscriptionController::class);
	Route::post('watchtower/subscribe-tags', 'TagsSubscriptionController@subscribe');
	Route::post('watchtower/tag-feed', 'PostsController@feed');

	Route::get('/', function () {
		return view('welcome');
	});
	Route::auth();


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

	Route::post('permission-roles','UserVerifyController@attachPermissionToRoles');
	Route::get('permission-roles','UserVerifyController@listPermissionRoles');
	Route::get('admin/verify-users','UserVerifyController@approve');

});

/*
 * API
 * */
Route::group(['prefix' => 'api/v1','middleware' => ['throttle:3,1']], function () {
	Route::resource('user',UserController::class);
	Route::resource('roles', RolesController::class);
	Route::resource('permissions', PermissionController::class);

});
