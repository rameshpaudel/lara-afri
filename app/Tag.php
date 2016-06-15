<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = 'tags';
	
    public function userTags()
    {
    	return $this->hasMany('App\UserTags', 'tag_id');
    }

    public function posts()
    {
    	return $this->hasMany('App\Posts', 'tag_id');
    }
}
