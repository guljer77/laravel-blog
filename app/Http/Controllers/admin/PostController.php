<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $post = Post::orderBy('id','desc')->get();
        return view('admin.modules.post.allpost',compact('post'));
    }
    public function add(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.modules.post.addpost',compact('categories','tags'));
    }
    public function store(Request $request){
        $request->validate([
            'post_title' => 'required|unique:posts',
            'post_des' => 'required',
            'category_name' => 'required',
            'tag_name' => 'required',
            'post_image' => 'required',
        ]);
        $cat_id = $request->category_name;
        $tag_id = $request->tag_name;
        Post::newPost($request);
        Category::where('id',$cat_id)->increment('post_count',1);
        Tag::where('id',$tag_id)->increment('post_count',1);
        return redirect('/admin/all-post')->with('message','Post added Successfully');
    }
    public function details($id){
        $post = Post::find($id);
        return view('admin.modules.post.details',compact('post'));
    }
    public function edit($id){
        $post = Post::find($id);
        return view('admin.modules.post.edit',compact('post'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'post_title' => 'required',
            'post_des' => 'required',
        ]);
        Post::updatePost($request,$id);
        return redirect('/admin/all-post')->with('message','Post Update Successfully');
    }
    public function delete($id){
        $cat_id = Post::where('id',$id)->value('category_name');
        $tag_id = Post::where('id',$id)->value('tag_name');
        Post::find($id)->delete();
        Category::where('id',$cat_id)->decrement('post_count',1);
        Tag::where('id',$tag_id)->decrement('post_count',1);
        return redirect('/admin/all-post')->with('message','Post Delete Successfully');
    }
}
