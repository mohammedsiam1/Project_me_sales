<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\Backend\UserRequest;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:Users', ['only' => ['index']]);
         $this->middleware('permission:Add User', ['only' => ['create','store']]);
         $this->middleware('permission:Add User', ['only' => ['edit','update']]);
         $this->middleware('permission:Add User', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users=User::orderBy('id','desc')->paginate(10);
       return view('Backend.User.index',compact('users'));
    }


    
    public function profile(){
        
        return view('Frontend.Collection.User-profile.profile');
    }


    public function updateInfo(Request $request){
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

 
    public function create()
    {
        $roles=Role::pluck('name','name')->all();
       
        return view('Backend.User.create',compact('roles'));

    }

 
    public function store(UserRequest $request)
    {
        $users=User::create([
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'email'=>$request->email,
        'role'=>$request->role,
        'password'=>Hash::make($request->password),
        'phone'=>$request->phone,
        'status'=>$request->status,
        'role_name'=>$request->role_name,
        ]);
        $users->assignRole($request->input('role_name'));

       return view('Backend.User.index',compact('users'))->with('message','created Successfully');
        
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user=User::findOrFail($id);
        $roles=Role::all()->pluck('name');
/*         $decrypted = Crypt::decrypt("$user->password");
 */        return view('Backend.User.edit',compact('user','roles'));
    }

   
    public function update(UserRequest $request, $id)
    {
        $users=User::findOrFail($id);
        $users->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'role'=>$request->role,
            'phone'=>$request->phone,
            'status'=>$request->status,
            'role_name'=>$request->role_name,
            ]);
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $users->assignRole($request->input('role_name'));

           return redirect()->back()->with('message','Updated Successfully');
            
    }


    public function destroy($id)
    {
        $users=User::findOrFail($id)->delete();
        return redirect()->back()->with('message','Deleted Successfully');

    }
}
