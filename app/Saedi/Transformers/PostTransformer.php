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
	 * @param $id
	 * @return mixed
     */
	public function username($id){
		return User::select('username')->where('id','=',$id)->first()->username;
	}

	/**
	 * @param $post
	 * @return array
     */
	public function getTag($post)
	{
		$tags = [];
		foreach($post['tagged'] as $item) {
			$tags[] = $item['tag_name'];
		}
		return $tags;
	}
	 /**
     * @param $post
     * @return array
     */	
	public function transform($post)
	{
		return [
			'title' => $post['title'],
			'content' => $post['content'],
			'tag' => $this->getTag($post),
			'user' => $this->username($post['user_id'])
		];
	}
}