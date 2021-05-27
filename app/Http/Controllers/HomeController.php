<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;
class HomeController extends Controller
{
    public function index(){
        $cate = Category::all();
        $pro = Product::all();
        return view('home.index',['cate'=>$cate,'pro'=>$pro]);
    }
    public function desc_product($id){
        //echo $id;
        $cate = Category::all();
        $pro = DB::table('product')->where('id',$id)->first();
        $id_product = $pro->id;
        $rela_pro = DB::table('product')->where('cateid',$pro->cateid)->whereNotIn('id',[$id])->get();
        //dd($rela_pro);
        //dd($pro);
        //$pro = Product::find($id);
        return view('home.desc_product',['pro'=>$pro,'rela_pro'=>$rela_pro,'cate'=>$cate]);
    }
}
