<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
session_start();

class MyController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function contact(){
        return view('contact');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            $request->session()->put('loginId', $user->id);
            return back()->with('success', 'Bạn đã đăng ký thành công!');
        }else{
            return back()->with('fail', 'Một số lỗi sai!');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5',
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('home_page');
            }else{
                return back()->with('fail', 'Mật khẩu không trùng khớp!');
            }
        }else{
            return back()->with('fail', 'Email chưa được đăng ký!');
        }
    }

    public function homePage(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        $all_pro = DB::table('tbl_product')->where('product_status', '1')->orderBy('product_id', 'desc')->limit(3)->get();
        return view('home_page', compact('data'))->with('category', $cate_pro)->with('brand', $brand_pro)->with('all_pro', $all_pro);
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }

    public function contactUser(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('contact_user', compact('data'));
    }

    public function productHome(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        $list = DB::table('tbl_product')->where('product_status', '1')->orderBy('product_id', 'desc')->get();
        $all_pro = DB::table('tbl_product')->where('product_status', '1')->orderBy('product_id', 'desc')->limit(3)->get();
        return view('product_home', compact('data'))->with('category', $cate_pro)->with('brand', $brand_pro)->with('all_pro', $all_pro)->with('list', $list);
    }

    public function search(Request $request){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        $keyword = $request->key;
        $search_product = DB::table('tbl_product')->where('product_name', 'like', '%'.$keyword.'%')->get();
        return view('search', compact('data'))->with('category', $cate_pro)->with('brand', $brand_pro)->with('search_product', $search_product);
    }
}
