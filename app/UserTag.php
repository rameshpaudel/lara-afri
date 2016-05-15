<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTag extends Model
{
	public function users()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function tags()
	{
		$return $this->belongsTo('App\Tag', 'tag_id');
	}
}
