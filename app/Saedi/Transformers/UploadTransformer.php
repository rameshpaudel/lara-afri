<?php 
namespace App\Saedi\Tansformers;

/**
* 
*/
class UploadTransformer extends Transformer
{
	
	public function transform($upload)
	{
		return [
			'name' => $upload['name'],
			'username' => $upload->user->username
			];
	}
}