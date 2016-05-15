<?php 
namespace App\Saedi\Transformers;


class UserTransformer extends Transformer
{
	
	public function transform($user)
	{
		return [
			'name' => $user['name'],
			'username' => $user['username'],
			'email' => $user['email']
			];
	}

}