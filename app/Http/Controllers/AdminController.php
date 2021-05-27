<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect('dashboard');
        }
        else{
            return redirect('admin')->send();
        }
    }

    public function all_admin(){
        $admin = Admin::all();
        return view('admin.admin.all_admin',['admin'=>$admin]);
    }
    public function add_admin(){
        return view('admin.admin.add_admin');
    }
    public function process_add_admin(Request $request){
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->password = md5($request->password);
        $get_image = $request->file('image');
        if(isset($get_image)){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload',$new_image);
            $admin->image = $new_image;
        }
        $admin->save();
        return redirect('admin/admin/all_admin');
    }
    public function remove_admin($id){
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('admin/admin/all_admin');
    }
    public function update_admin($id){
        $admin = Admin::find($id);
        return view('admin.admin.update_admin',['admin'=>$admin]);
    }
    public function process_update_admin($id,Request $request){
        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->password = md5($request->password);
        $get_image = $request->file('image');
        if(isset($get_image)){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload',$new_image);
            $admin->image = $new_image;
        }
        $admin->save();
        return redirect('admin/admin/all_admin');
    }
    public function LoginAdmin(){
        return view('admin.login.login');
    }
    public function process_login(Request $request){
        $username=$request->username;
        $password=md5($request->password);
        $login = DB::table('admin')->where('username',$username)->where('password',$password)->first();
        if($login){
            Session::put('admin_name',$login->name);
            Session::put('admin_id',$login->id);
            return redirect('dashboard');
        }
        else{
            return redirect('LoginAdmin');
        }
    }
}
