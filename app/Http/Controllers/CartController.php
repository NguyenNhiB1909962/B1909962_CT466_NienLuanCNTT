<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Cart;

session_start();

class CartController extends Controller
{
    public function cart(Request $request)
    {
        $id_product = $request->id_pro;
        $quantity = $request->qtt;
        $dataId = DB::table('tbl_product')->where('product_id', $id_product)->first();

        $data['id'] = $dataId->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $dataId->product_name;
        $data['price'] = $dataId->product_price;
        $data['weight'] = '47';
        $data['options']['image'] = $dataId->product_image;
        Cart::add($data);
        return Redirect::to('/cart');
    }

    public function sh_cart()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        return view('cart', compact('data'))->with('cate_pro', $cate_pro)->with('brand_pro', $brand_pro);
    }

    public function delete_cart($rowId)
    {
        Cart::remove($rowId);
        return Redirect::to('/cart');
    }

    public function update_cart(Request $request)
    {
        $rowId_cart = $request->rowId;
        $qty_cart = $request->quantity_cart;
        Cart::update($rowId_cart, $qty_cart);
        return Redirect::to('/cart');
    }

    public function check_out(){
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        return view('check_out', compact('data'))->with('cate_pro', $cate_pro)->with('brand_pro', $brand_pro);
    }

    public function checkout(Request $request){
        $request->validate([
            'shopping_cart_name'=>'required',
            'shopping_cart_email'=>'required|email',
            'shopping_cart_address'=>'required|min:5',
            'shopping_cart_phone'=>'required|min:10|regex:/(0)[0-9]/|not_regex:/[a-z]/',
        ]);
        $data = array();
        $data['shopping_cart_name'] = $request->shopping_cart_name;
        $data['shopping_cart_email'] = $request->shopping_cart_email;
        $data['shopping_cart_address'] = $request->shopping_cart_address;
        $data['shopping_cart_phone'] = $request->shopping_cart_phone;
        $data['shopping_cart_notes'] = $request->shopping_cart_notes;

        $shopping_cart_id = DB::table('tbl_shopping_cart')->insertGetId($data);

        Session::put('shopping_cart_id', $shopping_cart_id);

        return Redirect('/pay');
    }

    public function pay(){
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        return view('pay', compact('data'))->with('cate_pro', $cate_pro)->with('brand_pro', $brand_pro);
    }

    public function order_pro(Request $request){

        $pay_data = array();
        $pay_data['pay_method'] = $request->pay_option;
        $pay_data['pay_status'] = 'Đang chờ xử lý';

        $pay_id = DB::table('tbl_pay')->insertGetId($pay_data);

        $or_data = array();
        $or_data['loginId'] = Session::get('loginId');
        $or_data['shopping_cart_id'] = Session::get('shopping_cart_id');
        $or_data['pay_id'] = $pay_id;
        $or_data['order_total'] = Cart::total();
        $or_data['order_status'] = 'Đang chờ xử lý';
        
        $order_id = DB::table('tbl_order')->insertGetId($or_data);

        $content = Cart::content();
        foreach($content as $value_content){
            $or_de_data = array();
            $or_de_data['order_id'] = $order_id;
            $or_de_data['product_id'] = $value_content->id;
            $or_de_data['product_image'] = $value_content->options->image;
            $or_de_data['product_name'] = $value_content->name;
            $or_de_data['product_price'] = $value_content->price;
            $or_de_data['product_quantity'] = $value_content->qty;
            
            DB::table('tbl_order_details')->insert($or_de_data);
        }

        if($pay_data['pay_method'] == 1){
            Cart::destroy();
            $data = array();
            if (Session::has('loginId')) {
                $data = User::where('id', '=', Session::get('loginId'))->first();
            }
            $cate_pro = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
            $brand_pro = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
            return view('thanku', compact('data'))->with('cate_pro', $cate_pro)->with('brand_pro', $brand_pro);
        }
    }

    public function order(){
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $cate_pro = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_pro = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        $order_de_product = DB::table('tbl_order_details')->get();
        $order_product = DB::table('tbl_order')->get();
        return view('order', compact('data'))->with('cate_pro', $cate_pro)->with('brand_pro', $brand_pro)->with('order_de_product', $order_de_product)->with('order_product', $order_product);
    }

    public function order_manager(){
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $list_order = DB::table('tbl_order')->join('users', 'tbl_order.loginId', '=', 'users.id')->select('tbl_order.*', 'users.name')->orderBy('tbl_order.order_id', 'desc')->get();
        $manager = view('order_manager', compact('data'))->with('list_order', $list_order);
        return view('admin_home', compact('data'))->with('order_manager', $manager);
    }

    public function view_order($orderId){
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $order_by_id = DB::table('tbl_order')->join('users', 'tbl_order.loginId', '=', 'users.id')->join('tbl_shopping_cart', 'tbl_order.shopping_cart_id', '=', 'tbl_shopping_cart.shopping_cart_id')->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')->select('tbl_order.*', 'users.*', 'tbl_shopping_cart.*', 'tbl_order_details.*')->first();
        $order_de_by_id = DB::table('tbl_order_details')->where('order_id', $orderId)->get();
        $order_by_total = DB::table('tbl_order')->where('order_id', $orderId)->get();
        $manager = view('view_order', compact('data'))->with('order_by_id', $order_by_id)->with('order_de_by_id', $order_de_by_id)->with('order_by_total', $order_by_total);
        return view('admin_home', compact('data'))->with('view_order', $manager);
    }

    public function delete($orderId){
        DB::table('tbl_order')->where('order_id', $orderId)->delete();
        Session::put('message', 'Xóa đơn hàng thành công!');
        return Redirect::to('order_manager');
    }
}
