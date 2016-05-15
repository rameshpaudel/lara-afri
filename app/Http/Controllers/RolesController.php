<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRolesPostRequest;
use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$roles = Role::all();
		return $roles->toJson();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('roles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CreateRolesPostRequest $request, Role $role) {

		if($request->all()){
			$role->name = $request->name;
			$role->display_name = $request->display_name;
			$role->description = $request->description;
			$role->save();
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id, Role $role) {
		$roles = $role->findOrFail($id);
		return view('roles.edit',compact('roles'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  App\Requests\CreateRolesPostRequest  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update( CreateRolesPostRequest $request, Role $role , $id) {
		$role->findOrFail($id);
		if($request->all()){
			$role->name = $request->name;
			$role->display_name = $request->display_name;
			$role->description = $request->description;
			$role->save();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$role->findOrFail($id);
		$role->destroy();
	}
}
