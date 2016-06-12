<?php

namespace App\Saedi\Transformers;


class TagsTransformer extends Transformer
{
	
	public function transform($tag)
	{
		return [
			'name' => $tag['name'],
			];
	}

}