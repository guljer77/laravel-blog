<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    private static $post, $image, $imageName, $extension, $directory, $imageUrl;
    public static function getImageUrl($request){
        self::$image = $request->file('post_image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = 'team_design'.time().'.'.self::$extension;
        self::$directory = 'upload/post-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }
    public static function newPost($request){
        self::$post = new Post();
        self::$post->post_title = $request->post_title;
        self::$post->post_des = $request->post_des;
        self::$post->category_name = $request->category_name;
        self::$post->tag_name = $request->tag_name;
        self::$post->post_image = self::getImageUrl($request);
        self::$post->slug = strtolower(str_replace(' ','-',$request->post_title));
        self::$post->save();
    }

    public static function updatePost($request, $id){
        self::$post = Post::find($id);
        if($request->file('post_image')){
            if (file_exists(self::$post->post_image)){
                unlink(self::$post->post_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$post->post_image;
        }
        self::$post->post_title = $request->post_title;
        self::$post->post_des = $request->post_des;
        self::$post->post_image = self::$imageUrl;
        self::$post->slug = strtolower(str_replace(' ','-',$request->post_title));
        self::$post->save();
    }
}
