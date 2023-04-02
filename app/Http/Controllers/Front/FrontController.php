<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function home(){
        return view('frontend.layouts.app');
    }
    public function blog(){
        return view('frontend.layouts.app');
    }
    public function blog_post(Request $request){
        if($request->format() == 'html'){
             return view('frontend.layouts.app');
        }
        $posts = Post::with('user', 'category')->where('status', 1)->latest()->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }
    public function blog_details(Request $request, $id){
        if($request->format() == 'html'){
             return view('frontend.layouts.app');
        }
        $post = Post::with('user', 'category')->where('id', $id)->first();
        return response()->json([
            'post' => $post
        ], 200);
    }
    public function categories(){
        $categories = Category::where('status', 1)->latest()->get();
        return response()->json([
            'categories' => $categories
        ]);
    }
    public function latestPost(){
        $latestpost = Post::latest()->take(5)->get();
        return response()->json([
            'latestpost' => $latestpost
        ], 200);
    }
    public function postbycategory(Request $request, $id){
        if($request->format() == 'html'){
            return view('frontend.layouts.app');
       }
       $posts = Post::with('user', 'category')->where('category_id', $id)->where('status', 1)->latest()->get();
       return response()->json([
           'posts' => $posts
       ], 200);
    }
    public function search(Request $request){
        if($request->format() == 'html'){
            return view('frontend.layouts.app');
       }
       $inputValue = \Request::get('s');
       if($inputValue != null){
            $posts = Post::with('user', 'category')
            ->where('title','LIKE', "%$inputValue%")
            ->orwhere('description','LIKE', "%$inputValue%")
            ->where('status', 1)->latest()->get();
            return response()->json([
                'posts' => $posts
            ], 200);
       }else{
            return $this->blog_post($request);
       }
      
    }


}
