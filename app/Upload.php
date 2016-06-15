<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{

    protected $table = 'uploads';
    protected $fillable= ['file_name'];

    //protected $fillable = "";

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
