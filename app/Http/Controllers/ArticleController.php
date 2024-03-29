<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\User;

class ArticleController extends Controller
{
    //
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
        $formfields['user_id'] = auth()->user()->id;
        // get uploaded cover Image 
        if ($request->hasFile('cover_image')){
            $coverImage = $request->file('cover_image');
            $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('images'), $coverImageName);
            $formfields['cover_image'] = $coverImageName;
        }
        $article = Article::create($formfields);
        // notify other subscribers about new article
        //   get all subscribers
         $subscribers = User::where('role_id', '4')->get();
            // send email to all subscribers
            foreach($subscribers as $subscriber){
                $subscriber->notify(new \App\Notifications\NewArticle($article));
            }
        return redirect('/admin/articles')->with('success', 'Article saved!');
    }
    //function to upload image
    public function uploadArticleImages(Request $request){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
         ]);
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            // $name = time().'.'.$image->getClientOriginalExtension(); 
            // $destinationPath = public_path('/img');
            // $image->move($destinationPath, $name);
            $imgpath = $image->store('images', 'public');
            return response()->json(['success'=>'You have successfully upload image.', 'location' =>'/storage/'.$imgpath, 'name' => $imgpath]);
        }
       
    }
    //function to delete article
    public function delete(Article $listing){
        $listing->is_deleted = 1;
        $listing->save();
        return redirect('/admin/articles')->with('success', 'Article deleted!');
    }
    //function to edit article
    public function edit(Article $listing){
        $categories = Category::where('is_deleted', 0)->get();
        return view('admin.editarticle', [
            'article' => $listing,
            'categories' => $categories
        ]);
    }
    //function to update article
    public function update(Request $request, Article $listing){
        $formfields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
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
        $listing->update($formfields);
        return redirect('/admin/articles')->with('success', 'Article updated!');
    }
}
