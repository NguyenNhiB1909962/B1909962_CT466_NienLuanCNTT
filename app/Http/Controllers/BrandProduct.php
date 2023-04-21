<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class BrandProduct extends Controller
{
    public function add(){
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('add_brand_product', compact('data'));
    }

    public function list(){
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $list = DB::table('tbl_brand_product')->get();
        $manager = view('list_brand_product', compact('data'))->with('list_brand_product', $list);
        return view('admin_home', compact('data'))->with('list_brand_product', $manager);
    }

    public function save(Request $request){
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;
        DB::table('tbl_brand_product')->insert($data);
        Session::put('message', 'Thêm thương hiệu thành công!');
        return Redirect::to('list_brand_product');
    }

    public function status($brand_product_id){
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update(['brand_status'=>1]);
        Session::put('message', 'Kích hoạt hiển thị thương hiệu sản phẩm thành công!');
        return Redirect::to('list_brand_product');
    }

    public function unstatus($brand_product_id){
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update(['brand_status'=>0]);
        Session::put('message', 'Kích hoạt ẩn thương hiệu sản phẩm thành công!');
        return Redirect::to('list_brand_product');
    }

    public function edit($brand_product_id){
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $edit = DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->get();
        $manager = view('edit_brand_product', compact('data'))->with('edit_brand_product', $edit);
        return view('admin_home', compact('data'))->with('edit_brand_product', $manager);
    }

    public function update(Request $request, $brand_product_id){
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update($data);
        Session::put('message', 'Cập nhật thương hiệu thành công!');
        return Redirect::to('list_brand_product');
    }

    public function delete($brand_product_id){
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->delete();
        Session::put('message', 'Xóa thương hiệu thành công!');
        return Redirect::to('list_brand_product');
    }

    public function show_brand_home($brand_id){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand_product', 'tbl_product.brand_id', '=', 'tbl_brand_product.brand_id')->where('tbl_product.brand_id', $brand_id)->get();
        $brand_by_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id', $brand_id)->limit(1)->get();
        return view('brand_home', compact('data'))->with('category',$cate_pro)->with('brand', $brand_pro)->with('brand_id', $brand_by_id)->with('brand_name', $brand_by_name);
    }

    public function show_brand_pro($brand_id){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand_product', 'tbl_product.brand_id', '=', 'tbl_brand_product.brand_id')->where('tbl_product.brand_id', $brand_id)->get();
        $brand_by_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id', $brand_id)->limit(1)->get();
        return view('brand_product', compact('data'))->with('category',$cate_pro)->with('brand', $brand_pro)->with('brand_id', $brand_by_id)->with('brand_name', $brand_by_name);
    }
}
