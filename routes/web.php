<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\Product;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('register');
// });

//Frontend - User
Route::get('/', [MyController::class, 'welcome']);

Route::get('/welcome', [MyController::class, 'welcome']);

Route::get('/contact', [MyController::class, 'contact']);

Route::get('/login', [MyController::class, 'login']);

Route::get('/register', [MyController::class, 'register']);

Route::post('/register_user', [MyController::class, 'registerUser'])->name('register_user');

Route::post('/login_user', [MyController::class, 'loginUser'])->name('login_user');

Route::get('/home_page', [MyController::class, 'homePage']);

Route::get('/logout', [MyController::class, 'logout']);

Route::get('/contact_user', [MyController::class, 'contactUser']);

Route::get('/product_details/{product_id}', [Product::class, 'detail']);

Route::get('/product_home', [MyController::class, 'productHome']);

Route::post('/search', [MyController::class, 'search']);

//Category - Home
Route::get('/category_product/{category_id}', [CategoryProduct::class, 'show_cate_home']);

Route::get('/category_pro/{category_id}', [CategoryProduct::class, 'show_cate_pro']);

//Brand - Home
Route::get('/brand_product/{brand_id}', [BrandProduct::class, 'show_brand_home']);

Route::get('/brand_pro/{brand_id}', [BrandProduct::class, 'show_brand_pro']);

//Backend - Admin
Route::get('/admin', [AdminController::class, 'admin']);

Route::get('/admin_home', [AdminController::class, 'adminHome']);

Route::get('/admin_register', [AdminController::class, 'register']);

Route::post('/admin_registered', [AdminController::class, 'adminRegister'])->name('admin_registered');

Route::post('/admin_login', [AdminController::class, 'adminLogin'])->name('admin_login');

Route::get('/logout', [AdminController::class, 'logout']);


//Catagory
Route::get('/add_category_product', [CategoryProduct::class, 'add']);

Route::get('/list_category_product', [CategoryProduct::class, 'list']);

Route::post('/save_category_product', [CategoryProduct::class, 'save']);

Route::get('/status_category_product/{category_product_id}', [CategoryProduct::class, 'status']);

Route::get('/unstatus_category_product/{category_product_id}', [CategoryProduct::class, 'unstatus']);

Route::get('/edit_category_product/{category_product_id}', [CategoryProduct::class, 'edit']);

Route::post('/update_category_product/{category_product_id}', [CategoryProduct::class, 'update']);

Route::get('/delete_category_product/{category_product_id}', [CategoryProduct::class, 'delete']);

//Brand
Route::get('/add_brand_product', [BrandProduct::class, 'add']);

Route::get('/list_brand_product', [BrandProduct::class, 'list']);

Route::post('/save_brand_product', [BrandProduct::class, 'save']);

Route::get('/status_brand_product/{brand_product_id}', [BrandProduct::class, 'status']);

Route::get('/unstatus_brand_product/{brand_product_id}', [BrandProduct::class, 'unstatus']);

Route::get('/edit_brand_product/{brand_product_id}', [BrandProduct::class, 'edit']);

Route::post('/update_brand_product/{brand_product_id}', [BrandProduct::class, 'update']);

Route::get('/delete_brand_product/{brand_product_id}', [BrandProduct::class, 'delete']);

//Product
Route::get('/add_product', [Product::class, 'add']);

Route::get('/list_product', [Product::class, 'list']);

Route::post('/save_product', [Product::class, 'save']);

Route::get('/status_product/{product_id}', [Product::class, 'status']);

Route::get('/unstatus_product/{product_id}', [Product::class, 'unstatus']);

Route::get('/edit_product/{product_id}', [Product::class, 'edit']);

Route::post('/update_product/{product_id}', [Product::class, 'update']);

Route::get('/delete_product/{product_id}', [Product::class, 'delete']);

//Cart
Route::post('/add_cart', [CartController::class, 'cart']);

Route::get('/cart', [CartController::class, 'sh_cart']);

Route::get('/delete_cart/{rowId}', [CartController::class, 'delete_cart']);

Route::post('/update_cart', [CartController::class, 'update_cart']);

Route::get('/check_out', [CartController::class, 'check_out']);

Route::post('/checkout', [CartController::class, 'checkout']);

Route::get('/pay', [CartController::class, 'pay']);

Route::post('/order_pro', [CartController::class, 'order_pro']);

Route::get('/order', [CartController::class, 'order']);

//Order
Route::get('/order_manager', [CartController::class, 'order_manager']);

Route::get('/view_order/{orderId}', [CartController::class, 'view_order']);

Route::get('/delete_order/{orderId}', [CartController::class, 'delete']);