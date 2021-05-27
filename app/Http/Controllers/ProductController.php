<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ProductController extends Controller
{
    public function all_product(){
        $cate = Category::all();
        $product = Product::all();
        return view('admin.product.all_product',['cate'=>$cate,'product'=>$product]);
    }
    public function add_product(){
        $cate = Category::all();
        return view('admin.product.add_product',['cate'=>$cate]);
    }
    public function process_add_product(Request $request){
        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->description = $request->des;
        $product->cateid = $request->cateid;
        $get_image = $request->file('image');
        if(isset($get_image)){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload',$new_image);
            $product->image = $new_image;
        }
        $product->save();
        return redirect('admin/product/all_product');
    }
    public function remove_product($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/product/all_product');
    }
    public function update_product($id){
        $product = Product::find($id);
        $cate = Category::all();
        return view('admin.product.update_product',['product'=>$product,'cate'=>$cate]);
    }
    public function process_update_product(Request $request,$id){
        $product = Product::find($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->description = $request->des;
        $product->cateid = $request->cateid;
        $get_image = $request->file('image');
        if(isset($get_image)){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload',$new_image);
            $product->image = $new_image;
        }
        $product->save();
        return redirect('admin/product/all_product');
    }
}
