<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;



class AdminController extends Controller
{
    public function adminDashboard(){

        return view('admin.index');
    }

    public function adminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function adminProfileView(){

       
        return view('admin.profile.profile_view');

    }

    public function adminProfileEdit($id){

        $admin=User::findOrFail($id);

          return view('admin.profile.profile_edit',compact('admin'));
    }

    public function adminProfileupdate(Request $request)

    
       
    {
        $user_id=$request->user_id;
$old_photo=$request->old_photo;
        $user=User::find($user_id);
       
        $validatedData = $request->validate([
            'name' => ['required','string', 'max:255'],
            'photo' => ['mimes:jpg,bmp,png'

        ],
            'email' => ['required','email', 'max:255',
            Rule::unique('users')->ignore($user->id)
        ],
            

        
        
        ]);




        

if($request->file('photo')){

@unlink($old_photo);

$image=$request->photo;
$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

Image::make($image)->resize(300,300)->save('upload/admin_images/'.$name_gen);
  $save_url = 'upload/admin_images/'.$name_gen;
  $user->name=$request->name;
  $user->email=$request->email;
$user->photo=$save_url;
$user->save();

$notification = array(
    'message' => 'Brand Data Update Successfully',
    'alert-type' => 'info'
 );
 return redirect()->route('admin.dashboard')->with($notification);

        }

else{
    $user->name=$request->name;
    $user->email=$request->email;
  
  $user->save();  

  $notification = array(
    'message' => 'User Profile Update Successfully',
    'alert-type' => 'info'
 );
  return redirect()->route('admin.dashboard')->with($notification);

}

        

        
        

       
    }

    public function adminchangePassword(){

        return view('admin.profile.update_password');
    }


    public function adminupdateePassword(Request $request): RedirectResponse
    {

        $validated = $request->validate( [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $notification = array(
            'message' => 'User password changed Successfully',
            'alert-type' => 'info'
         );
          return redirect()->route('admin.dashboard')->with($notification);
    }
}
