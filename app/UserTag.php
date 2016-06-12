<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTag extends Model
{
	protected $table = 'user_tag';
	protected $fillable = ['user_id','tag_id'];
	public $timestamps = false;
	public function users()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function tags()
	{
		return $this->belongsTo('App\Tag', 'tag_id');
	}
}
