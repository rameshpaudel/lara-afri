<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table="carousels";
    protected $fillable = ['image','text','user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
