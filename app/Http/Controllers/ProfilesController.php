<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\BusinessProfile;
use App\PersonalProfile;
use App\UserMetaData;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index($slug)
    {
        $businessProfile = null;
        $user = User::where('username','=',$slug)->get()->first();
        if($user == null)
        {
            return 'No user found';
        }
        $id = $user->id;
        $metadata = UserMetaData::where('user_id','=',$id)->get();
        $personalProfile = PersonalProfile::where('user_id','=',$id)->first();

        if($personalProfile == null)
        {
            return 'No profile found';
        }
        if($user->user_registered == 2){
            $businessProfile = BusinessProfile::where('user_id','=',$id)->first();
        }
        return view('profile',compact('businessProfile','personalProfile', 'user','metadata'));

    }

    public function myProfile()
    {
        $authUser = Auth::user();
        $businessProfile = null;
        if(! $authUser)
        {
                return redirect('login')
                        ->withErrors('Please log in to view your profile');
            }
        $id = $authUser->id;

        $metadata = UserMetaData::where('user_id','=',$id)->get();

        $user = User::where('id','=',$id)->get()->first();

        $personalProfile = PersonalProfile::where('user_id','=',$id)->first();

        if($user->user_registered == '2'){
            $businessProfile = BusinessProfile::where('user_id','=',$id)->first();

        }
        return view('profile',compact('personalProfile','businessProfile', 'user', 'metadata'));

    }
}
