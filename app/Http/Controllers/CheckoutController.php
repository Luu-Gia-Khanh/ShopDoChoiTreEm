<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\UserMeta;
use Session;
use Cart;
class CheckoutController extends Controller
{
    public function login_user(){
        return view('home.checkout.login_user');
    }
    public function process_login_user(Request $request){
        $email = $request->email;
        $password = $request->password;
        $login = DB::table('user')->where('email',$email)->where('pass',$password)->first();
        if($login){
            Session::put('user_id',$login->id);
            Session::put('user_name',$login->username);
            Session::put('user_image',$login->image);
            return redirect('show_cart');
        }
        else{
            return redirect('login_user');
        }
    }
    public function logout_user(Request $request){
        $request->session()->forget('user_id');
        $request->session()->forget('user_name');
        $request->session()->forget('user_image');
        $request->session()->forget('usermeta_id');
        return redirect('login_user');
    }
    public function add_user_meta(){
        return view('home.checkout.user_meta');
    }
    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    public function process_add_user_meta(Request $request){
        if(Session::get('user_id')!=null){
            $user_id = Session::get('user_id');
        }
        else{
            $user_id = '';
        }
        $data['uid'] = $user_id;
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['company'] = $request->company;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['country'] = $request->country;
        $data['mobile'] = $request->mobile;
        $data['zip'] = $this->generateRandomString();
        $user = DB::table('usermeta')->where('uid',$user_id)->first();
        if($user == null){
           $usermeta_id = DB::table('usermeta')->insertGetId($data);
            Session::put('usermeta_id',$usermeta_id);
        }
        else{
            $data['firstname'] = $request->firstname;
            $data['lastname'] = $request->lastname;
            $data['company'] = $request->company;
            $data['address'] = $request->address;
            $data['city'] = $request->city;
            $data['state'] = $request->state;
            $data['country'] = $request->country;
            $data['mobile'] = $request->mobile;
            //print_r($user_meta);
            $get_usermeta_id = DB::table('usermeta')->where('uid',$user_id)->first();
            Session::put('usermeta_id',$get_usermeta_id->id);
            $update_usermeta = DB::table('usermeta')->where('uid',$user_id)->update($data);
        }
        return redirect('check_out');
    }
    public function check_out(){
        return view('home.checkout.check_out');
    }
    public function payment(Request $request){
         $payment['paymentmethod'] = $request->payment;
         $totalprice = $request->totalprice;
         $voucher = $request->voucher;
         if(is_numeric($voucher)){
            $totalprice = $totalprice - $voucher;
         }
        //payment
        $payment_method = DB::table('payment')->insertGetId($payment);
        //order
        $data_order = array();
        $data_order['uid'] = Session::get('user_id');
        $data_order['totalprice'] = $totalprice;
        $data_order['orderstatus'] = 'ordered';
        $data_order['idpayment'] = $payment_method;
        $order_id = DB::table('orders')->insertGetId($data_order);

        $con = Cart::content();
        //order item
        $data_order_item = array();
        foreach($con as $c){
            $data_order_item['pid'] = $c->id;
            $data_order_item['pquantity'] = $c->qty;
            $data_order_item['productprice'] = $c->price;
            $data_order_item['orderid'] = $order_id;
            $order_item = DB::table('orderitems')->insert($data_order_item);
        }
        if($request->payment==1){
            $totalprice = $totalprice/24000;
            return view('home.checkout.payment_paypal',['totalprice'=>$totalprice]);
        }
        Cart::destroy();
        return redirect('history_order');
    }
    public function history_oder(){
        $user_id = Session::get('user_id');
        $order = DB::table('orders')->where('uid',$user_id)->orderBy('id','DESC')->get();
        return view('home.checkout.history_order',['order'=>$order]);
    }
    public function order_item($id){
        $order_item = DB::table('orderitems')
        ->join('orders','orders.id','=','orderitems.orderid')
        ->join('product','product.id','=','orderitems.pid')->where('orderid',$id)->get();

        return view('home.checkout.order_item',['order_item'=>$order_item]);
    }
}
