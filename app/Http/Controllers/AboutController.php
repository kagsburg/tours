<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
class AboutController extends Controller
{
    //
    //get Most Recent Articles
    public function index(){
         $articles = Article::where('is_deleted', 0)->orderBy('created_at', 'desc')->take(3)->get();

        return view('home.about', ['articles' => $articles]);
    }
    //for the home page
    public function home(){
        //get all articles 
        $articles = Article::where('is_deleted', 0)->orderBy('created_at', 'desc')->paginate(15);
        //get all categories
        $categories = Category::where('is_deleted', 0)->get();
        //get most recent articles
        $recent = Article::where('is_deleted', 0)->orderBy('created_at', 'desc')->take(3)->get();
        return view('home.index', ['articles' => $articles, 'categories' => $categories, 'recent'=>$recent]);
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
}
