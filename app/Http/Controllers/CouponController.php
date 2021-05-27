<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Session;
use DB;
class CouponController extends Controller
{
    public function add_coupon(){
        return view('admin.coupon.add_coupon');
    }
    public function process_add_voucher(Request $request){
        $coupon = new Coupon();
        $coupon->namecoupon = $request->namecoupon;
        $coupon->codecoupon = $request->codecoupon;
        $coupon->feature = $request->feature;
        $coupon->amount_coupon = $request->amount_coupon;
        $coupon->save();
        return redirect('');
    }
    public function check_coupon(Request $request){
        $couponcode = $request->voucher;
        $subtotal = $request->subtotal;
        $coupon = DB::table('coupon')->where('codecoupon',$couponcode)->first();
        if($coupon){
            if($coupon->feature==0){
                $discount = ($subtotal*$coupon->amount_coupon)/100;
                echo $discount;
            }
            else{
                $discount = $coupon->amount_coupon;
                echo $discount;
            }
        }
        else{
            echo "ERROR COUPON";
        }
    }
}
