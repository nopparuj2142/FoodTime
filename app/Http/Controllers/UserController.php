<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{
    //Check ID User
    public function index(){
        return view('profile', array('user' => Auth::user()));
    }

    public function edit($id)
    {
        return view('editprofile', array('user' => Auth::user()));
    }

    public function update(Request $request){
        //Request info
        $this->validate($request,[
            'name'=>'Required',
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        
        //dd($request->all());
        //Change Picture Avatar
        if($request->hasfile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('uploads/avatars/' . $filename));

            $user->avatar = $filename;   
        }
        $user->save();
        
        return redirect('profile');
    }
    
}
