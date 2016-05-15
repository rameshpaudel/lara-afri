<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Http\Requests;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Permission $permission)
    {
        //For Now
        $permissions = $permission->all();
        return $permissions->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Permission $permission)
    {
        if($request->all())
        {
            $permission->name = $request->name;
            $permission->display_name = $request->display_name;
            $permission->description = $request->description;
            $permission->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Permission $permission)
    {
        $permissions = $permission->findOrFail($id);
        return $permissions->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Permission $permission)
    {
        $permissions = $permission->findOrFail($id);
        return $permissions->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Permission $permission)
    {
        $permission->findOrFail($id);
        if($request->all())
        {
            $permission->name = $request->name;
            $permission->display_name = $request->display_name;
            $permission->description = $request->description;
            $permission->save();
        }
        //return 'updated';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Permission $permission)
    {
        $permissions = $permission->findOrFail($id);
        $permissions->destroy($id);
    }
}
