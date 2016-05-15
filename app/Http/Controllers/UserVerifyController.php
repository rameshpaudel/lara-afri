<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Upload;
use App\Permission;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class UserVerifyController extends Controller {

	public function attachUsersToRoles(Request $request, User $user) {
		if($request->all()){
			$userId= User::where('id',$request->get('usersId'))->first()->id;
			$roles = Role::where('id',$request->get('role'))->first()->name;

			//User::attachRolesToUser
			$user->attachRolesToUser($roles  ,$userId);

			Session::flash('sucMsg', 'Successfully attached roles to users');
			return Redirect::action('UserVerifyController@listUserRoles');
		}
		Session::flash('errMsg', 'Successfully attached roles to users');
		return Redirect::action('UserVerifyController@listUserRoles');

	}

	public function business() {
		return view('accounts.business');
	}

	public function personal() {
		return view('accounts.personal');
	}

	public function listUserRoles(){
		$userList = User::all()->lists('username','id');
		$role= Role::all()->lists('display_name','id');
		//$rolesList = list($roles->name,$roles->id);
		return view('accounts.user_roles', compact('userList','role'));
	}

	public function listPermissionRoles(){
		$permissions = Permission::all()->lists('display_name','id');
		$roles= Role::all()->lists('display_name','id');
		//$rolesList = list($roles->name,$roles->id);
		return view('accounts.role_permission', compact('permissions','roles'));
	}



	public function attachPermissionToRoles(Request $request)
	{
		$role = Role::where('id', '=' , $request->get('role_id') )->first();
		$permission = Permission::where('id', '=' , $request->get('permission_id'))->first();
		$permission = Permission::where('id', '=' , $request->get('permission_id'))->first();
		$role->attachPermission($permission);

		session()->flash('sucMsg','Attached Permission to role');
		redirect('/profile');

	}

	public function approve()
	{
		$uploads = Upload::all();
		dd($uploads);
		return view('accounts.approve',compact('uploads'));
	}

	public function approveUpload()
	{

	}
}
