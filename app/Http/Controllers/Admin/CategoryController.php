<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function all_category(Request $requset){
        if($requset->format() == 'html'){
            return view('backend.layouts.app');
        }
        $categories = Category::where('status', 1)->latest()->get();
        return response()->json([
            'categories' => $categories
        ]);
    }
   public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string|unique:categories',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return response()->json([
            'status' => 200,
            'message' => 'Category Stored Successfully'
        ]);
   }
   public function edit(Request $requset,$id){
    if($requset->format() == 'html'){
        return view('backend.layouts.app');
    }
    $category = Category::find($id);
    return response()->json($category);

   }
   public function update(Request $request, $id){
    $this->validate($request, [
        'name' => 'required|string',
    ]);
    $category = Category::find($id);
    $category->name = $request->name;
    $category->slug = Str::slug($request->name);
    $category->update();
    return response()->json([
        'status' => 200,
        'message' => 'Category Updated Successfully'
    ]);
}
public function destroy($id){
    $category = Category::find($id);
    $category->delete();
    return response()->json([
        'message' => 'Category deleted successfully'
    ]);
}
public function delete_selected_category(Request $request, $id){

   $items = explode(',', $id);
   foreach($items as $item){
      $category = Category::find($item);
      $category->delete();
   }

}


}
