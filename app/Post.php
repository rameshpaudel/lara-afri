<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;
class Post extends Model
{
    use Taggable;
    
    protected $table = 'posts';
    protected $fillable = ['title','content','user_id'];

    public function owner()
    {
    	return $this->belongsTo('App\User','user_id');
    }
    
}
