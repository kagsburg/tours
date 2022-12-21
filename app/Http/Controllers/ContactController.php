<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class ContactController extends Controller
{
    //

    public function index(){
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
            $message->from($data['email']);
            $message->to('kagsburg@gmail.com', 'Timothy Kaganzi')->subject($data['subject']);
        });
        return redirect('/contact')->with('success',"Message Sent Successfully");
    }

}
