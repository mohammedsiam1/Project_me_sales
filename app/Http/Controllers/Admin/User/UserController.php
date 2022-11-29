<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\Backend\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('id','desc')->paginate(10);
       return view('Backend.User.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.User.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $users=User::create([
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'email'=>$request->email,
        'role'=>$request->role,
        'password'=>Hash::make($request->password),
        'phone'=>$request->phone,
        ]);
       return view('Backend.User.index',compact('users'))->with('message','created Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
/*         $decrypted = Crypt::decrypt("$user->password");
 */        return view('Backend.User.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $users=User::findOrFail($id);
        $users->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            ]);
           return redirect()->back()->with('message','Updated Successfully');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users=User::findOrFail($id)->delete();
        return redirect()->back()->with('message','Deleted Successfully');

    }
}
