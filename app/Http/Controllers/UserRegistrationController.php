<?php

namespace App\Http\Controllers;

use App\Role;
use App\Upload;
use App\User;
use App\Http\Requests;
use App\PersonalProfile;
use App\BusinessProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use DateTime;

class UserRegistrationController extends Controller
{
    /**
     * @param Request $request
     * @return $this
     */
    public function registerPersonalAccount(Request $request)
    {
        if($request->all()){
            if($request->get('password') != $request->get('rePassword'))
            {
                return response()->json(['message' => 'Both Passwords Should Be the same']);
            }
            $validator = Validator::make($request->all(),[
                'username' => 'required|unique:users|min:4|max:255',
                'email' => 'required|unique:users|email',
                'password' => 'required|min:6|max:255',
                'first_name' => 'required|min:5|max:150',
                'last_name' => 'required|min:5|max:150',
                //'certificate'  => 'required|mimes:jpeg, png, bmp, gif, ,svg',
                'country' => 'required|min:2|max:150',
                'dob' => 'required|min:5|max:150'
            ]);
            if($validator->fails())
            {
                return response()->json($validator->messages()->all(),200);
            }


                $role = new Role();
                $attach = $role->where('slug','=','personal-user')->first();

            /*Inserting in Users Table*/
                $user = new User;

                $user->username = $request->get('username');
                $user->email = $request->get('email');
                $user->password = bcrypt($request->get('password'));
                $user->status = 0;
                $user->api_token = str_random(60);
                //Needs to be refactored by making a user's info class
                $user->user_registered = 1;

                $user->user_type = 1;
                $user->save();


                //$user->attachRole($attach);


                $dob = new DateTime($request->get('dob'));
                /*Inserting in personal profile table*/
                $personalProfile = new PersonalProfile;
                $personalProfile->first_name = $request->get('first_name');
                $personalProfile->last_name = $request->get('last_name');
                $personalProfile->country = $request->get('country');
                $personalProfile->dob = $dob->format('Y-m-d');
                $personalProfile->user_id = $user->id;
                $personalProfile->save();

               /* $upload = new Upload();
                $upload->file_name = $request->file('certificate');
                $upload->user_id = $user->id;
                $upload->approved = 0;
                $upload->save();*/

            Auth::loginUsingId($user->id);
            /*return redirect('profile')->with('sucMsg','User successfully created');*/
            $data = [

                'status' => 200,
                'message' => 'Personal User succesfully added',
                'route' => '/profile',
            ];
            return response()->json($data);
        }
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function registerBusinessAccount(Request $request)
    {
        if ($request->all()) {
            if ($request->get('password') != $request->get('re_password')) {
                return response()->json(['message' => 'Both Passwords Should Be the same']);
            }
             
            $validator = Validator::make($request->all(), [
                'username' => 'required|unique:users|min:4|max:255',
                'email' => 'required|unique:users|email',
                'password' => 'required|min:6|max:255',
                'first_name' => 'required|min:5|max:150',
                'last_name' => 'required|min:5|max:150',
                'country' => 'required|min:5|max:150',
                'dob' => '',
                'company_name' => 'required|min:3',
                'city' => 'required|min:5',
                'country' => 'required|min:2|max:150',
                'address' => 'required|min:5|max:150',
                'established_on' => 'required|min:2|max:150',
                'certificate' => 'image| mimes:jpeg,png,bmp,gif,svg'
            ]);

            if ($validator->fails()) {
               return response()->json($validator->messages()->all() ,200);
            }

            $role = new Role();
            $attach = $role->where('name','=','business')->first();

            $user = new User;

            $user->username = $request->get('username');
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $user->status = 0;
            $user->api_token = str_random(60);
            //Needs to be refactored by making a user's info class
            $user->user_registered = 2;
            $user->user_type = 2;

            $user->save();
            $user->attachRole($attach);

            $dob = new DateTime($request->get('dob'));
            $personalProfile = new PersonalProfile;
            $personalProfile->first_name = $request->get('first_name');
            $personalProfile->last_name = $request->get('last_name');
            $personalProfile->country = $request->get('country');
            $personalProfile->dob = $dob->format('Y-m-d');
            $personalProfile->user_id = $user->id;
            $personalProfile->save();

            $established_on = new DateTime($request->get('established_on'));
            /*Business Profile*/
            $businessProfile = new BusinessProfile;
            $businessProfile->company_name = $request->get('company_name');
            $businessProfile->user_type = $request->get('user_type');
            $businessProfile->city = $request->get('city');
            $businessProfile->country = $request->get('country');
            $businessProfile->address = $request->get('address');
            $businessProfile->established_on = $established_on->format('Y-m-d');
            $businessProfile->user_id = $user->id;
            $businessProfile->save();
            /*Image Upload*/
            $image = $request->file('certificate');
            $destinationPath = base_path() . '/public/uploads/images/certificates/';
            $image->move($destinationPath, $image->getClientOriginalName());
            //Upload Model
            $upload = new Upload;
            $upload->file_name = $image->getClientOriginalName();
            $upload->user_id = $user->id;
            $upload->save();

            Auth::loginUsingId($user->id);
            
            //return redirect('profile')->with('sucMsg', 'User created successfully');

            $data = [

                'status' => 200,
                'message' => 'Personal User succesfully added',
                'route' => '/profile',
            ];
            return response()->json($data);
        }
    }
}
