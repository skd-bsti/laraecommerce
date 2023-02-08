<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
        //__create method__//
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'slug'=>'required',
            'description'=>'required',
            'image'=>'nullable|mimes:jpg, jpeg, png',
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',     
        ]);
       
        $category=new Category;
        $category->name = $validated['name'];
        $category->slug = Str::of($validated['name'])->slug('-');

        $photo = $validated['image'];
        if ($photo) {
        $photoname= time().'.'.$photo->getClientOriginalExtension();
        $photo->move('uploads/category/', $photoname );
        
        $category->image = $photoname;
        }  

        $category->description = $validated['description'];
        $category->meta_title = $validated['meta_title'];
        $category->meta_keyword = $validated['meta_keyword'];
        $category->meta_description = $validated['meta_description'];
        $category->status = $request->status == true? '1':'0';
        $category->save();
        $notification = array('message'=>'Category Inserted!', 'alert-type'=> 'success');
        return redirect()->route('category.index')->with($notification);
        
        // return redirect()->back()->with($notification);
    }
     //__edit method
     public function edit($id)
     {
        $data=Category::find($id);
         return view('admin.category.edit', compact('data'));

     }
     public function update(Request $request, $id)
     {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug'=>'required',
            'description'=>'required',
            'image'=>'nullable|mimes:jpg, jpeg, png',
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',     
        ]);
        $category=Category::findOrFail($id); //get the record
     
        $category->name = $validated['name'];
        $category->slug = Str::of($validated['name'])->slug('-');

        $photo = $request->image;
        if ($photo) {
            $path ='uploads/category/'.$category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        $photoname= time().'.'.$photo->getClientOriginalExtension();
        $photo->move('uploads/category/', $photoname );
        
        $category->image = $photoname;
        }  

        $category->description = $validated['description'];
        $category->meta_title = $validated['meta_title'];
        $category->meta_keyword = $validated['meta_keyword'];
        $category->meta_description = $validated['meta_description'];
        $category->status = $request->status == true? '1':'0';
        $category->update();
        $notification = array('message'=>'Category updated!', 'alert-type'=> 'success');
        return redirect()->route('category.index')->with($notification);

    }
    // public function deleteCategory($id)
    // {
    //     $category=Category::findOrFail($id);
    //     if (File::exists($post->image)) {
    //         File::delete($post->image);
    //     }
    //     $category->delete();
    //     $notification = array('message'=>'Category Deleted!', 'alert-type'=> 'success');
    //     return redirect()->back()->with($notification);
    // }
}
