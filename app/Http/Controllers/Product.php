<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class Product extends Controller
{
    public function add(){
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->orderBy('brand_id', 'desc')->get();
        return view('add_product', compact('data'))->with('cate_pro', $cate_pro)->with('brand_pro', $brand_pro);
    }

    public function list(){
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $list = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')->orderBy('tbl_product.product_id', 'desc')->get();
        $manager = view('list_product', compact('data'))->with('list_product', $list);
        return view('admin_home', compact('data'))->with('list_product', $manager);
    }

    public function save(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;

        $get_img = $request->file('product_image');
        if($get_img){
            $get_name = $get_img->getClientOriginalName();
            $name_img = current(explode('.',$get_name));
            $new_img = $name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('public/upload/product', $new_img);
            $data['product_image'] = $new_img;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công!');
            return Redirect::to('list_product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Thêm sản phẩm không thành công!');
        return Redirect::to('list_product');
    }

    public function status($product_id){
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>1]);
        Session::put('message', 'Kích hoạt hiển thị sản phẩm thành công!');
        return Redirect::to('list_product');
    }

    public function unstatus($product_id){
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>0]);
        Session::put('message', 'Kích hoạt ẩn sản phẩm thành công!');
        return Redirect::to('list_product');
    }

    public function edit($product_id){
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->orderBy('brand_id', 'desc')->get();
        $edit = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager = view('edit_product', compact('data'))->with('edit_product', $edit)->with('cate_pro', $cate_pro)->with('brand_pro', $brand_pro);
        return view('admin_home', compact('data'))->with('edit_product', $manager);
    }

    public function update(Request $request, $product_id){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;

        $get_img = $request->file('product_image');
        if($get_img){
            $get_name = $get_img->getClientOriginalName();
            $name_img = current(explode('.',$get_name));
            $new_img = $name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('public/upload/product', $new_img);
            $data['product_image'] = $new_img;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công!');
            return Redirect::to('list_product');
        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công!');
        return Redirect::to('list_product');
    }

    public function delete($product_id){
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công!');
        return Redirect::to('list_product');
    }

    public function detail($product_id){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        $details = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')->where('tbl_product.product_id', $product_id)->get();
        foreach($details as $key => $detail_pro){
            $category_id = $detail_pro->category_id;
        }
        $related = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')->where('tbl_category_product.category_id', $category_id)->whereNotIn('tbl_product.product_id', [$product_id])->get();
        return view('product_details', compact('data'))->with('category', $cate_pro)->with('brand', $brand_pro)->with('details', $details)->with('related', $related);
    }
}
