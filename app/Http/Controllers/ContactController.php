<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\About;
use Mail;
class ContactController extends Controller
{
    //

    public function index(){
        $author = User::where('role_id', 1)->first();
        //check if author is not set in session array 
       
            // pass $author  to session array 
        session(['author' => $author]);
        
        return view('home.contact');
    }
    //send Email
    public function store(Request $request){
        $request->validate([
            'name'=>['required', 'min:3'],
            'email'=>['required', 'email'],
            'subject'=>['required', 'min:3'],
            'message'=>['required', 'min:3'],
        ]);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );
        \Mail::send('email.contact', $data, function($message) use ($data){
            $message->from('info@regularguyug.com ', 'Regular Guy Ug Contact Form');
            $message->to('info@regularguyug.com', 'Regular Guy Ug Contact Form')->subject($data['subject']);
        });
        return redirect('/contact')->with('success',"Message Sent Successfully");
    }

}
