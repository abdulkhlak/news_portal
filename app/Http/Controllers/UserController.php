<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserDashboard()
    {
        $userData=User::find(Auth::user()->id);
        return view('frontend.user_dashboard',compact('userData'));

    }//End Method

    public function UserProfileStore(Request $request)
    {
        
        $user= User::find(Auth::user()->id);
        if ($request->hasfile('photo')) {
            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }
            $image_path = mt_rand() . time() . " " . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('/upload/user_images'), $image_path);
            $user->photo="/upload/user_images/". $image_path;
        } 
        $user->username=$request->username;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->save();
        return redirect()->back()->with('status','Profile Updated Successfully ');

    }//End Method
}
