<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;
use App\Models\User;
use App\Models\About;

class SocialController extends Controller
{
    //
    public function index(){
        //get author's about section 
        $author = User::where('role_id', 1)->first();
        //get about me 
        $about = About::where('user_id', $author->id)->first();
        //get socials
        $socials = Social::where('user_id', $author->id)->first();
        // dd($socials);
        if ($socials == null) {
            $socials = new Social();
            $socials->facebook = '';
            $socials->youtube = '';
            $socials->twitter = '';
            $socials->instagram = '';
            $socials->user_id = auth()->user()->id;
            $socials->save();
        }
        return view('admin.social', ['socials' => $socials]);
    }
    public function store(Request $request){
        $socials = Social::where('user_id', auth()->user()->id)->first();
        $socials->facebook = $request->facebook;
        $socials->youtube = $request->youtube;
        $socials->twitter = $request->twitter;
        $socials->instagram = $request->instagram;
        $socials->save();
        return redirect()->back()->with('success', 'Socials updated successfully');
    }
}
