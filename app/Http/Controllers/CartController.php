<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
class CartController extends Controller
{
    public function save_cart(Request $request){
        $product_id = $request->id;
        $qty = $request->qty;
        $product_info = DB::table('product')->where('id',$product_id)->first();
        $data['id'] = $product_id;
        $data['qty'] = $qty;
        $data['name'] = $product_info->title;
        $data['price'] = $product_info->price;
        $data['weight'] = '123';
        $data['options']['image'] = $product_info->image;
        Cart::add($data);
        //Cart::destroy();
    }
    public function show_cart(){
        return view('home.cart.show_cart');
    }
    public function remove_item_cart($id){
        Cart::update($id,0);
        return redirect('show_cart');
    }
    public function update_cart(Request $request){
        $id = $request->id;
        $qty = $request->qty;
        Cart::update($id,$qty);
    }
    public function clear_cart(){
        Cart::destroy();
        return redirect('show_cart');
    }
}
