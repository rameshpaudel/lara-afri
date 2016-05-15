<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMetaData extends Model
{
    protected $table="users_meta_data";

    public function users()
    {
        return $this->belongsToMany('App\User','user_id');
    }
}
