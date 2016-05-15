<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessProfile extends Model
{
    protected $table = 'business_profiles';
    public function user()
    {
        $this->belongsTo('App\User','user_id');
    }
}
