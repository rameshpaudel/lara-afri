<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Saedi\Transformers\UserTransformer;

class UserController extends ApiController
{
	/**
	 * @var Saedi\Transformers\UserTransformer
	 */
	protected $userTransformer;

	/**
	 * UserController constructor.
	 * @param UserTransformer $userTransformer
	 */
	public function __construct(UserTransformer $userTransformer)
	{
		$this->userTransformer = $userTransformer;
	}

	public function index()
    {
    	$users = User::all();
    	return $this->respond([
    		'data' => $this->userTransformer->transformCollection($users->toArray()),
			'meta-data' => (boolean) rand(0,1)
    		]);
    }
	public function show($id)
	{
		$user = User::find($id);

		if( ! $user )
		{
			return $this->respondNotFound('User Does not exist');
		}
		return $this->respond([
			'data' => $this->userTransformer->transform($user),
			'meta-data' => 'Here is some metadata'
		]);
	}

	public function store()
	{

	}


}
