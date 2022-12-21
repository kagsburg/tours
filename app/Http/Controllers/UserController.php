<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    //
     //login route view
     public function login(){
        return view ('home.login');
    }
    public function store(Request $request){
        $users = $request->validate([
            'name'=>['required', 'min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:8','confirmed'],
        ]);
        //hash password
        $users['password']=bcrypt($users['password']);
        //create user
        $user= User::create($users);
        //login user
        auth()->login($user);
        return redirect('/')->with('success',"User Created Successfully");
    }
     //authenicate users 
     public function authenicate(Request $request){
        $users = $request->validate([
            'email'=>['required'],
            'password'=>['required'],
        ]);
        $credentials = $request->only('email','password');
        if(!auth()->attempt($credentials)){
            return back()->withErrors('email','Invalid Credentials')->onlyInput('email');
        }
        $request->session()->regenerateToken();
        return redirect('admin/articles')->with('success',"User Logged In Successfully");
    }
    //user profile
    public function profile(){
        $user_info = auth()->user();
        return view('admin.profile',[
            'user_info'=>$user_info
        ]);
    }
    //update user profile
    public function update(Request $request, User $id){
        $users = $request->validate([
            'name'=>['required', 'min:3'],
            'email'=>['required','email',Rule::unique('users','email')->ignore($id->id)],           
        ]);
        $id->name=$users['name'];
        $id->email=$users['email'];
        $id->save();
        return redirect('/profile')->with('success',"User Profile Updated Successfully");
    }
    //reset password
    public function updatepassword(Request $request, User $id){
        $users = $request->validate([
            'password'=>['required','min:8','confirmed'],
        ]);
        $id->password=bcrypt($users['password']);
        $id->save();
        return redirect('/profile')->with('success',"User Password Updated Successfully");
    }
    //logout user
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success',"User Logged Out Successfully");
    }
}
