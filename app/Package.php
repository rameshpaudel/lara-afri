<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	protected $table = "packages";
	protected $fillable = [	"name", "description", "amount", "duration"	];

	
}
