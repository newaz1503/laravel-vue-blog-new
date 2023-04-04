<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index(Request $requset){
        if($requset->format() == 'html'){
            return view('backend.layouts.app');
        }
        $posts = Post::with('user', 'category')->where('status', 1)->latest()->get();
        return response()->json([
            'posts' => $posts
        ]);
    }
    public function store(Request $request){
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        if($request->image){
            $string_position = strpos($request->image, ';');
            $sub_str = substr($request->image, 0, $string_position);
            $extension = explode('/', $sub_str)[1];
            $imageName = time().'.'.$extension;
            $img = Image::make($request->image)->resize(320, 240);
            $image_path = public_path()."/uploads/image/post/";
            $img->save($image_path.$imageName);
        }
       
        $post = new Post;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->save();
        return response()->json([
            'status' => 200,
            'message' => 'post Stored Successfully'
        ]);
   }
   public function edit(Request $requset,$id){
    if($requset->format() == 'html'){
        return view('backend.layouts.app');
    }
    $post = Post::find($id);
    return response()->json($post);
   }

   public function update(Request $request, $id){
    $this->validate($request, [
        'category_id' => 'required',
        'title' => 'required|string',
        'description' => 'required|string',
    ]);
    $post = Post::find($id);
    if($request->image != $post->image){
        $string_position = strpos($request->image, ';');
        $sub_str = substr($request->image, 0, $string_position);
        $extension = explode('/', $sub_str)[1];
        $imageName = time().'.'.$extension;
        $img = Image::make($request->image)->resize(320, 240);
        $image_path = public_path()."/uploads/image/post/";
        $path = public_path()."/uploads/image/post/".$post->image;
        if($path){
            @unlink($path);
        }
        $img->save($image_path.$imageName);
       
    }else{
        $imageName = $post->image;
    }
   
    $post->category_id = $request->category_id;
    $post->user_id = Auth::id();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->image = $imageName;
    $post->save();
    return response()->json([
        'status' => 200,
        'message' => 'post Updated Successfully'
    ]);
}

   public function destroy($id){
    $post = Post::find($id);
    $path =public_path()."/uploads/image/post/".$post->image;
    if($path){
       @unlink($path);
    }
    $post->delete();
    return response()->json([
        'message' => 'Post deleted successfully'
    ]);
   }



}
