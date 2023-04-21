<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class CategoryProduct extends Controller
{
    public function add(){
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('add_category_product', compact('data'));
    }

    public function list(){
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $list = DB::table('tbl_category_product')->get();
        $manager = view('list_category_product', compact('data'))->with('list_category_product', $list);
        return view('admin_home', compact('data'))->with('list_category_product', $manager);
    }

    public function save(Request $request){
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục thành công!');
        return Redirect::to('list_category_product');
    }

    public function status($category_product_id){
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status'=>1]);
        Session::put('message', 'Kích hoạt hiển thị danh mục sản phẩm thành công!');
        return Redirect::to('list_category_product');
    }

    public function unstatus($category_product_id){
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status'=>0]);
        Session::put('message', 'Kích hoạt ẩn danh mục sản phẩm thành công!');
        return Redirect::to('list_category_product');
    }

    public function edit($category_product_id){
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $edit = DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
        $manager = view('edit_category_product', compact('data'))->with('edit_category_product', $edit);
        return view('admin_home', compact('data'))->with('edit_category_product', $manager);
    }

    public function update(Request $request, $category_product_id){
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
        Session::put('message', 'Cập nhật danh mục thành công!');
        return Redirect::to('list_category_product');
    }

    public function delete($category_product_id){
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
        Session::put('message', 'Xóa danh mục thành công!');
        return Redirect::to('list_category_product');
    }

    public function show_cate_home($category_id){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        $cate_id = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')->where('tbl_product.category_id', $category_id)->get();
        $cate_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $category_id)->limit(1)->get();
        return view('category_home', compact('data'))->with('category',$cate_pro)->with('brand', $brand_pro)->with('cate_id', $cate_id)->with('cate_name', $cate_name);
    }

    public function show_cate_pro($category_id){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        $cate_id = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')->where('tbl_product.category_id', $category_id)->get();
        $cate_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $category_id)->limit(1)->get();
        return view('category_product', compact('data'))->with('category',$cate_pro)->with('brand', $brand_pro)->with('cate_id', $cate_id)->with('cate_name', $cate_name);
    }
}
