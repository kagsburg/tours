<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
class BannerController extends Controller
{
    //

    public function index()
    {
        // get all banner content 
        $banner = Banner::where ('is_deleted', 0)
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('admin.banners.index', compact('banner'));
    }
    // create banner
    public function create()
    {
        return view('admin.banners.create');
    }
    // store banner
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

        }
        $banner = new Banner([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image' => $name,
            'is_deleted' => 0,
        ]);
        $banner->save();
        return redirect('admin/banners/add')->with('success',"Banner Created Successfully");        
    }
    // edit banner
    public function edit(Banner $id)
    {
        $banner = $id;
        return view('admin.banners.update', compact('banner'));
    }
    // update banner
    public function update(Request $request, Banner $id)
    {

        $banner = $id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $banner->image = $name;
        }
        $banner->title = $request->get('title');
        $banner->description = $request->get('description');
        $banner->save();
        return redirect('admin/banners')->with('success',"Banner Updated Successfully");        
    }
    // delete banner
    public function delete(Banner $id)
    {
        $banner = $id;
        $banner->is_deleted = 1;
        $banner->save();
        return redirect('admin/banners')->with('success',"Banner Deleted Successfully");        
    }
}
