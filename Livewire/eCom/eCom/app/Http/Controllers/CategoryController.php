<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return view('admin.category.index');
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = new Category();
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $image->move('uploads/category', $fileName);
            $finalPath='uploads/category/'.$fileName;
            $category->image = $finalPath;
        }
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keywords = $data['meta_keywords'];
        $category->status=$request->status==true?'1':'0';
       $category->save();
       return redirect('admin/category')->with('message','category added Successfully');

    }
    public function edit(Category $category){
        return view('admin.category.edit',compact('category'));
    }
    public function update(CategoryRequest $request,$category)
    {
        $data = $request->validated();
        $category = Category::findOrFail($category);
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];

        if ($request->hasFile('image')) {
            $path=$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $image->move('uploads/category', $fileName);
            $finalPath='uploads/category/'.$fileName;
            $category->image = $finalPath;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keywords = $data['meta_keywords'];
        $category->status=$request->status==true?'1':'0';
       $category->save();
       return redirect('admin/category')->with('message','category updated Successfully');

    }
}
