<?php 

namespace App\Saedi\Factory;
use App\PersonalProfile;
class Factory
{
	public static function createPersonalProfile($request)
	{
		return PersonalProfile::create($request);
	}
}