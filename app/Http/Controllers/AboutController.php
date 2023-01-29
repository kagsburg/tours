<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\About;
use App\Models\Social;
use App\Models\User;
use App\Models\Banner;
use App\Models\Role;
class AboutController extends Controller
{
    //
    //get Most Recent Articles
    public function index(){
         $articles = Article::where('is_deleted', 0)->orderBy('created_at', 'desc')->take(3)->get();
         $author = User::where('role_id', 1)->first();
        //get about me 
        $about = About::where('user_id', $author->id)->first();
        //check if author is not set in session array 
        
            // pass $author  to session array 
        session(['author' => $author]);
       
        return view('home.about', ['articles' => $articles
        , 'abouts'=>$about]);
    }
    //for the home page
    public function home(){
        //get all articles 
        $articles = Article::where('is_deleted', 0)->orderBy('created_at', 'desc')->paginate(15);
        //get all categories
        $categories = Category::where('is_deleted', 0)->get();
        //get most recent articles
        $recent = Article::where('is_deleted', 0)->orderBy('created_at', 'desc')->take(3)->get();
        //get author's about section 
        $author = User::where('role_id', 1)->first();
        //get about me 
        $about = About::where('user_id', $author->id)->first();
        //get socials
        $socials = Social::where('user_id', $author->id)->get();
        // pass $social  to session array 
        session(['socials' => $socials]);
        session(['author' => $author]);
        session(['abouts' => $about]);
       
        //
        $socials = session('socials');
        // get all banners
        $banners = Banner::where('is_deleted', 0)->orderBy('id', 'desc')->take(3)->get();
       
        return view('home.index', ['articles' => $articles, 
        'categories' => $categories, 
        'recent'=>$recent, 
        'abouts'=>$about, 
        'banners'=>$banners,
        'socials'=>$socials]);
    }
    //get single article
    public function show(Article $id){
        $categories = Category::where('is_deleted', 0)->get();
        //get related articles by category expected the current one 
        $related = Article::where('is_deleted',0)->whereNot('id',$id->id)->orderBy('created_at','desc')->take(3)
        ->get();
        return view('home.singleblog', ['article' => $id, 'categories' => $categories, 'recent'=>$related]);
    }
    // //get articles by category
    public function category(Category $id){
        $articles = Article::where('is_deleted', 0)->where('category_id',$id->id)->orderBy('created_at', 'desc')->paginate(15);
        return view('home.category', ['articles' => $articles, 'category'=>$id]);
    }
    //show about me to admin user 
    public function aboutme(){

        $about = About::where('user_id', auth()->user()->id)->first();
        if ( $about == null ){
            $about = new About();
            $about->title = '';
            $about->description = '';
            $about->image1 = '';
            $about->image2 = '';
            $about->image3='';
            $about->user_id = auth()->user()->id;
            $about->save();
        }
        return view('admin.aboutme', ['about'=>$about]);
    }
    //update about me
    public function updateaboutme(Request $request){
        $about = About::where('user_id', auth()->user()->id)->first();
        $about->title = $request->title;
        $about->description = $request->description;
        // check if there is an image1
        if($request->hasFile('background_image')){
            $image1 = $request->file('background_image');
            $image1Name = time().'.'.$image1->getClientOriginalExtension();
            $image1->move(public_path('images'), $image1Name);
            $about->image1 = $image1Name;
        }
        // check if there is an image2
        if($request->hasFile('image1')){
            $image2 = $request->file('image1');
            $image2Name = time().'.'.$image2->getClientOriginalExtension();
            $image2->move(public_path('images'), $image2Name);
            $about->image2 = $image2Name;
        }
        // check if there is an image3
        if($request->hasFile('image2')){
            $image3 = $request->file('image2');
            $image3Name = time().'.'.$image3->getClientOriginalExtension();
            $image3->move(public_path('images'), $image3Name);
            $about->image3 = $image3Name;
        }
        $about->save();
        return redirect()->route('admin.abouts');
    }

    // listing all blog articles 
    public function list(){
        $articles = Article::where('is_deleted', 0)->orderBy('created_at', 'desc')->paginate(15);
         //get all categories
         $categories = Category::where('is_deleted', 0)->get();
         //get most recent articles
         $recent = Article::where('is_deleted', 0)->orderBy('created_at', 'desc')->take(3)->get();
        return view('home.blogs', ['articles' => $articles,
        'categories' => $categories,
        'recent'=>$recent]);    
    }
    // add subscriber
    public function subscribe (Request $request){
        $formfields = $request->validate([
            'subscriber' => 'required',
        ]);
        // get subscriber role 
        $role = Role::where('name', 'Subscriber')->first();
        // check if subscriber already exists
        $subscriber = User::where('email', $request->subscriber)->first();
        if($subscriber == null){
            // create new subscriber
            $subscriber = new User();
            $subscriber->name = $request->subscriber;
            $subscriber->email = $request->subscriber;
            $subscriber->password = bcrypt('12345678');
            $subscriber->role_id = $role->id;
            $subscriber->save();
            // show success message
            return redirect()->back()->with('success', 'You have successfully subscribed to our newsletter');
            // $request->session()->flash('success', 'You have successfully subscribed to our newsletter');
        }else{
            // show error message
            return redirect()->back()->with('error', 'You are already subscribed to our newsletter');
            // $request->session()->flash('error', 'You are already subscribed to our newsletter');
        }
        // add subscriber to subscribers table
        // $sub = new User();
        // $sub->user_id = $subscriber->id;
        // $sub->save();
        // return redirect()->back();
    }

}
