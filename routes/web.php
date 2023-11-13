<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\SslCommerzPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/product-category/{id}', [WebsiteController::class, 'categoryProduct'])->name('product-category');
Route::get('/product-detail/{id}', [WebsiteController::class, 'productDetail'])->name('product-detail');
Route::post('/cart/add/{id}', [CartController::class, 'index'])->name('cart.add');
Route::get('/cart/show', [CartController::class, 'show'])->name('cart.show');
//Route::get('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/cart/update/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/close/{rowId}', [CartController::class, 'close'])->name('cart.close');

Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/new-order', [CheckoutController::class, 'newOrder'])->name('new-order');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('complete-order');

Route::get('/customer-logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
Route::get('/customer-login', [CustomerAuthController::class, 'index'])->name('customer.login');
Route::post('/customer-login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::get('/customer-register', [CustomerAuthController::class, 'register'])->name('customer.register');
Route::post('/customer-register', [CustomerAuthController::class, 'newCustomer'])->name('customer.register');

Route::middleware(['customer'])->group(function (){
    Route::get('/customer-dashboard', [CustomerProfileController::class, 'index'])->name('customer.dashboard')->middleware('customer');
    Route::get('/customer-profile', [CustomerProfileController::class, 'profile'])->name('customer.profile');
    Route::get('/customer-order', [CustomerProfileController::class, 'order'])->name('customer.order');
    Route::get('/customer-order-detail/{id}', [CustomerProfileController::class, 'orderDetail'])->name('customer.order-detail');
    Route::get('/customer-order-payment', [CustomerProfileController::class, 'payment'])->name('customer.payment');
    Route::get('/customer-change-password', [CustomerProfileController::class, 'changePassword'])->name('customer.change-password');
});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/add-category', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/new-category', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/manage-category', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/sub-category/add',[SubCategoryController::class, 'index'])->name('sub-category.add');
    Route::post('/sub-category/create',[SubCategoryController::class, 'create'])->name('sub-category.create');
    Route::get('/sub-category/manage',[SubCategoryController::class, 'manage'])->name('sub-category.manage');
    Route::get('/sub-category/edit/{id}',[SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::post('/sub-category/update/{id}',[SubCategoryController::class, 'update'])->name('sub-category.update');
    Route::get('/sub-category/delete/{id}',[SubCategoryController::class, 'delete'])->name('sub-category.delete');

    Route::get('/brand/add',[BrandController::class, 'index'])->name('brand.add');
    Route::post('/brand/new',[BrandController::class, 'create'])->name('brand.create');
    Route::get('/brand/manage',[BrandController::class, 'manage'])->name('brand.manage');
    Route::get('/brand/edit/{id}',[BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}',[BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/delete/{id}',[BrandController::class, 'delete'])->name('brand.delete');

    Route::get('/unit/add',[UnitController::class, 'index'])->name('unit.add');
    Route::post('/unit/create',[UnitController::class, 'create'])->name('unit.create');
    Route::get('/unit/manage',[UnitController::class, 'manage'])->name('unit.manage');
    Route::get('/unit/edit/{id}',[UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}',[UnitController::class, 'update'])->name('unit.update');
    Route::get('/unit/delete/{id}',[UnitController::class, 'delete'])->name('unit.delete');

    Route::resource('product', ProductController::class);
    Route::get('/get-sub-category-by-category', [ProductController::class, 'getCategoryBySubCategory'])->name('get-sub-category-by-category');

    Route::get('/admin/all-order', [AdminOrderController::class, 'index'])->name('admin.all-order');
    Route::get('/admin/order-detail/{id}', [AdminOrderController::class, 'detail'])->name('admin.order-detail');
    Route::get('/admin/order-edit/{id}', [AdminOrderController::class, 'edit'])->name('admin.order-edit');
    Route::post('/admin/update-order/{id}', [AdminOrderController::class, 'update'])->name('admin.update-order');
    Route::get('/admin/order-invoice/{id}', [AdminOrderController::class, 'invoice'])->name('admin.order-invoice');
    Route::get('/admin/all-download-order-invoice/{id}', [AdminOrderController::class, 'downloadInvoice'])->name('admin.download-order-invoice');
    Route::get('/admin/order-delete/{id}', [AdminOrderController::class, 'delete'])->name('admin.order-delete');

});
