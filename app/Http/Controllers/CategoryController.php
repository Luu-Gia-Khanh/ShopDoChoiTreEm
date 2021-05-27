<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function all_category(){
        $all_cate = Category::all();
        return view('admin.category.all_category',['all_cate'=>$all_cate]);
    }
    public function add_category(){
        return view('admin.category.add_category');
    }
    public function process_add_category(Request $request){

        $request->validate([
            'name'=>'required|min:2',
        ],[
            'name.required' => 'không để trống',
            'name.min' => 'name phải ít nhất 2 ký tự'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        return redirect('admin/category/all_category');
    }
    public function remove_category($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category/all_category');
    }
    public function update_category($id){
        $cate = Category::find($id);
        return view('admin.category.update_category',['cate'=>$cate]);
    }
    public function process_update_category(Request $request,$id){
        $cate = Category::find($id);
        $cate->name = $request->name;
        $cate->status = $request->status;
        $cate->save();
        return redirect('admin/category/all_category');
    }
}
