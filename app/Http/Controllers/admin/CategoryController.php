<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id','desc')->get();
        return view('admin.modules.category.allcategory',compact('categories'));
    }
    public function add(){
        return view('admin.modules.category.addcategory');
    }
    public function store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        Category::newCategory($request);
        return redirect('/admin/all-category')->with('message','Category Added Successfully');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.modules.category.edit',compact('category'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'category_name' => 'required',
        ]);
        Category::updateCategory($request, $id);
        return redirect('/admin/all-category')->with('message','Category Update Successfully');
    }
    public function delete($id){
        Category::find($id)->delete();
        return redirect('/admin/all-category')->with('message','Category Delete Successfully');
    }
}
