<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class User extends Authenticatable
{
     use ShinobiTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function attachRolesToUser(Role $roles, $userId)
    {
        $admin = Auth::user();
        $user = $this->where('id','=', $userId)->first();
        return $user->roles($roles)->attach($admin->id);

    }

    public function tags()
    {
        return $this->hasMany('App\TagSubscription','user_tag','user_id','tag_id');
    }
    public function posts()
    {
        return $this->hasMany('App\Posts');
    }


    public function metaData()
    {
        return $this->hasMany('App\UserMetaData','user_id');
    }


    public function uploads()
    {
        return $this->hasMany('App\Upload','user_id');
    }


    public function personalProfile()
    {
        return $this->hasOne('App\PersonalProfile','user_id');
    }


    public function businessProfile()
    {
        return $this->hasOne('App\BusinessProfile','user_id');
    }
    public function carousel()
    {
        return $this->hasMany('App\Carousel','user_id');
    }
}
