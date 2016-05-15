<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalProfile extends Model
{
    protected $table = 'personal_profiles';

    public function user()
    {
        $this->belongsTo('App\User','user_id');
    }
}
