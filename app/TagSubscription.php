<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagSubscription extends Model
{
    protected $fillable = ['id','user_id','tags_id'];
    protected $table = 'user_tag_subscribe';

    public function subscriptions()
    {
        return $this->belongsToMany('App\User', 'user_id', 'tags_id')->withTimestamps();
    }
}
