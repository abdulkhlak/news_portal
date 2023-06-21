<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function UserLogout( Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect(route('login'))->with('status','User Logout Successfully');

    }//End Method

    public function UserChangePassword()
    {
        $user= User::find(Auth::user()->id);
        return view('frontend.user_change_password',compact('user'));

    }//End Method

    public function UserUpdatePassword( Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required', 
            'new_password_confirmed' => 'required|same:new_password',
        ]);
       
        
        $user= Auth::user();
        if(!Hash::check($request->old_password, $user->password))
        {
            return back()->with('error',"Old Password Does't Match!!");
          
             // match the old password
        }
          //update the new password
        $user->password= Hash::make($request->new_password);
        $user->save();
        return back()->with('status',' Password Change Successfully');

    }//End Method
}
