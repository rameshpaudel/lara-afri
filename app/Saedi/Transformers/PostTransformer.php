<?php 
namespace App\Saedi\Transformers;
use App\User;

/**
 * Class PostTransformer
 * @package App\Saedi\Transformers
 */
class PostTransformer extends Transformer
{

	/**
     * @param $post
     * @return array
     */	
	public function transform($post)
	{
		return [
			'title' => $post['title'],
			'content' => $post['content'],
			//Getting the tag names in an array
			'tag' =>  array_pluck($post['tagged'],'tag_name'),
			//Getting user of the post
			'user' => $post['owner']['username']
		];
	}
}