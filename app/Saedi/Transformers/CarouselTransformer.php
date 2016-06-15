<?php 
namespace App\Saedi\Transformers;

class CarouselTransformer extends Transformers
{
	public function username($id){
		return User::select('username')->where('id','=',$id)->first()->username;
	}
	public function transform($carousel)
	{
		return [
			'id' => $carousel['id'],
			'image' => ''$carousel['image'],
			'content' => $carousel['text'],
			'user' => $this->username()
		];
	}
}