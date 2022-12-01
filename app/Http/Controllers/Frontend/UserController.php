<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(){
        
        return view('Frontend.Collection.User-profile.profile');
    }


    public function update(Request $request){
        $request->validate([
            'first_name'=>['required','string'],
            'last_name'=>['required','string'],
            'zip_code'=>['required','digits:6'],
            'phone'=>['required','digits:10'],
            'address'=>['required','string','max:499'],
        ]);
        $user=User::findOrFail(Auth::user()->id);
        $user->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
        ]);

        $user->userDetails()->updateOrCreate([
            'user_id'=>$user->id
        ],[
            'zip_code'=>$request->zip_code,
            'address'=>$request->address,
        ]);
        return redirect()->back()->with('message','User Profile Updated Successfully');
    }
    
}
