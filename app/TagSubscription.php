<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagSubscription extends Model
{
    protected $fillable = ['user_id','tags_id'];
    protected $table = 'user_tag';

    public function subscriptions()
    {
        return $this->belongsToMany('App\User', 'user_id', 'tags_id')->withTimestamps();
    }
}
