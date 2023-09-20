<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $post = Post::orderBy('id','desc')->take(4)->get();
        $banner = Post::orderBy('id','desc')->get();
        return view('website.modules.index',compact('post','banner'));
    }
    public function blog(){
        $blogs = Post::orderBy('id','desc')->paginate(4);
        return view('website.modules.blog',compact('blogs'));
    }
    public function about(){
        return view('website.modules.about');
    }
    public function category($id){
        $category = Category::find($id);
        $post = Post::where('category_name',$id)->latest()->get();
        return view('website.modules.category',compact('category','post'));
    }
    public function tags($id){
        $tag = Tag::find($id);
        $post = Post::where('tag_name',$id)->orderBy('id','desc')->get();
        return view('website.modules.tag',compact('tag','post'));
    }
    public function details($id){
        $post = Post::find($id);
        return view('website.modules.details',compact('post'));
    }
}
