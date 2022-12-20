<?php

namespace App\Http\Controllers;
<<<<<<< HEAD

use Illuminate\Http\Request;
=======
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;
>>>>>>> 010474cdd42bfb32ebd753687b231e64e87bd1e7

class ArticleController extends Controller
{
    //
<<<<<<< HEAD
=======
    public function addarticle(){
        $categories = Category::where('is_deleted', 0)->get();

        return view('admin.addarticle', ['categories' => $categories]);
    }
    //function to list all articles
    public function index(){
        $articles = Article::where('is_deleted', 0)->paginate(15);
        // dd($articles);
        return view('admin.article', ['collection' => $articles]);
    }
    // function to add article
    public function store(Request $request){
       $formfields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'cover_image' => 'required'
        ]);
        //add user id
        $formfields['user_id'] = 1;
        // get uploaded cover Image 
        if ($request->hasFile('cover_image')){
            $coverImage = $request->file('cover_image');
            $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('images'), $coverImageName);
            $formfields['cover_image'] = $coverImageName;
        }
        Article::create($formfields);
        // if ($request->hasFile('other_images')){
        //     $otherImages = $request->file('other_images');
        //     foreach ($otherImages as $otherImage){
        //         $otherImageName = time() . '.' . $otherImage->getClientOriginalExtension();
        //         $otherImage->move(public_path('images'), $otherImageName);
        //         // $article->images()->create([
        //         //     'image' => $otherImageName
        //         // ]);
        //     }
        // }
        return redirect('/admin/articles')->with('success', 'Article saved!');
        // $article = new Article([
        //     'title' => $request->get('title'),
        //     'description' => $request->get('description'),
        //     'content' => $request->get('content'),
        //     'category_id' => $request->get('category_id'),
        //     'user_id' => $request->get('user_id'),
        //     'cover_image' => $request->get('cover_image')
        // ]);
        // $article->save();
        return redirect('/admin/articles')->with('success', 'Article saved!');
    }
>>>>>>> 010474cdd42bfb32ebd753687b231e64e87bd1e7
}
