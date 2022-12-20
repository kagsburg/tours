<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories=Category::where('is_deleted','=', '0' )->orderBy('id','DESC')->paginate(15);
        // dd($categories);
        return view('admin.category',[
            'categories'=>$categories
        ]);        
    }
    public function store(Request $request){
        $categories = $request->validate([
            'name'=>['required', 'min:3'],
            'description'=>['required',],
        ]);
         $categories['created_by']=auth()->user()->id;
        //create category
        $category= Category::create($categories);
        return redirect('admin/categories')->with('success',"Category Created Successfully");
    }
    //delete category
    public function delete(Category $id){
        $id->is_deleted=1;
        $id->save();
        return redirect('admin/categories')->with('success',"Category Deleted Successfully");
    }
    //edit category
    public function edit(Category $listing){
        return view('admin.editcategory',[
            'category'=>$listing
        ]);
    }
    //update category   
    public function update(Request $request, Category $id){
        $categories = $request->validate([
            'name'=>['required', 'min:3'],
            'description'=>['required',],
        ]);
        $id->name=$categories['name'];
        $id->description=$categories['description'];
        $id->save();
        return redirect('admin/categories')->with('success',"Category Updated Successfully");
    }

}
