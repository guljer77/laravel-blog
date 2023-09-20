<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    private static $tag;
    public static function newTag($request){
        self::$tag = new Tag();
        self::$tag->tag_name = $request->tag_name;
        self::$tag->category_name = $request->category_name;
        self::$tag->slug = strtolower(str_replace(' ','-',$request->tag_name));
        self::$tag->save();
    }
    public static function updateTag($request, $id){
        self::$tag = Tag::find($id);
        self::$tag->tag_name = $request->tag_name;
        self::$tag->slug = strtolower(str_replace(' ','-',$request->tag_name));
        self::$tag->save();
    }
}
