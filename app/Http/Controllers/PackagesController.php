<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Http\Requests;
use App\Saedi\Transformers\PackageTransformer;
class PackagesController extends ApiController
{
    /**
     * @var Saedi\Transformers\UserTransformer
     */
    protected $packageTransformer;

    /**
     * UserController constructor.
     * @param UserTransformer $userTransformer
     */
    public function __construct(PackageTransformer $userTransformer)
    {
        $this->packageTransformer = $packageTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return $this->respond([
            'data' => $this->packageTransformer->transformCollection($packages->toArray()),
            'meta_data' => 'Package meta data'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Package::create([]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::where('id','=',$id)->get();
        if(!$package){
            return $this->respondNotFound('Package couldn\'t be found');
        }
        return $this->respond([
            'data' => $this->packageTransformer->transformCollection($package->toArray()),
            'meta-data' => 'Meta Data for Individual Package'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package = Package::find($id);
        if(!$package){
            return $this->respondNotFound('Package couldn\'t be found');
        }
        $package->title = $request->get('title');
        $package->save();
        $this->respond([
            'message' => 'Package updated sucessfully'
            ])
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Package::delete($id)){
            return $this->respond([
                'message' => "Package Deleted Sucessfully"
                ]);
        }
        return $this->respond([
            'message' => 'Sorry !! the package couldn\'t be deleted',
            /*'status'*/
            ]);
    }
}
