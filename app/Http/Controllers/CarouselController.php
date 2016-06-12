<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Saedi\Transformers\CarouselTransformer;

class CarouselController extends ApiController
{
	/**
	 * @var Saedi\Transformers\UserTransformer
	 */
	protected $carouselTransformer;

	/**
	 * UserController constructor.
	 * @param UserTransformer $userTransformer
	 */
	public function __construct(CarouselTransformer $userTransformer)
	{
		$this->carouselTransformer = $carouselTransformer;
	}
    public function index()
    {
    	$carousel = Carousel::all();
    	return $this->respond([
    		'data' => $this->carouselTransformer->transformCollection($users->toArray()),
			'meta-data' => (boolean) rand(0,1)
    		]);
    }

    public function show($id)
    {
    	
    }

    public function store()
    {
    	
    }

    public function destroy($id)
    {
    	
    }
}
