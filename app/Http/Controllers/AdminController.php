<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class AdminController extends Controller
{
    public function admin(){
        return view('admin_login');
    }

    public function adminHome(){
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('admin_home', compact('data'));
    }

    public function register(){
        return view('admin_register');
    }

    public function adminRegister(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5',
        ]);
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $res = $admin->save();
        if($res){
            return back()->with('success', 'Bạn đã đăng ký thành công!');
        }else{
            return back()->with('fail', 'Một số lỗi sai!');
        }
    }

    public function adminLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5',
        ]);
        $admin = Admin::where('email', '=', $request->email)->first();
        if($admin){
            if(Hash::check($request->password, $admin->password)){
                $request->session()->put('loginId', $admin->id);
                return redirect('admin_home');
            }else{
                return back()->with('fail', 'Mật khẩu không trùng khớp!');
            }
        }else{
            return back()->with('fail', 'Email chưa được đăng ký!');
        }
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('admin');
        }
    }
}
