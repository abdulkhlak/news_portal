<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
class AdminController extends Controller
{
    public function AdminDashboard()
    {
      
        
       return view('admin.index'); 
    } //End Method

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification=array(
            'message'=>'Admin Logout Succefully',
            'alert-type'=>'info'
        );
        return redirect(route('admin.logout.page'))->with($notification);

    }//End Method

    public function AdminLogin()
    {
        return view('admin.admin_login');

    }//End Method

    public function AdminLogoutPage()
    {
        return view('admin.admin_logout');

    }//End Method

    public function AdminProfile(Request $request): View
    {
        return view('admin.admin_profile_view', [
            'profileData' => $request->user(),
        ]);

    }//End Method

    public function AdminProfileStore(Request $request)
    {
        $userData= User::find(Auth::user()->id);
        if ($request->hasfile('photo')) {
            if ($userData->photo && file_exists(public_path($userData->photo))) {
                unlink(public_path($userData->photo));
            }
            $image_path = mt_rand() . time() . " " . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('/upload/admin_images'), $image_path);
            $userData->photo="/upload/admin_images/". $image_path;
        } 
        $userData->username=$request->username;
        $userData->name=$request->name;
        $userData->email=$request->email;
        $userData->phone=$request->phone;
       
      
        $userData->save();
        $notification=array(
            'message'=>'Admin Profile Updated Succefully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }//End Method


    public function AdminChangePassword(Request $request): View
    {
        return view('admin.admin_change_password', [
            'profileData' => $request->user(),
        ]);

    }//End Method

    public function AdminUpdatePassword( Request $request)
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

    }
}
