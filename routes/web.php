<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpensiveController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ReturnInvoiceController;
use App\Http\Controllers\SupplierPaymentController;
use App\Http\Controllers\CustomerReceiveMoneyController;

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

//  dashboard controller
Route::middleware('customauth')->group(function () {
    Route::get('/Dashboard', [DashboardController::class, 'dashboardView'])->name('dashboard.view');
    // customer due list
    Route::get('/customer-due-list', [DashboardController::class, 'dueList'])->name('customerdue.list');
    // supplier due list
    Route::get('/supplier-due-list', [DashboardController::class, 'supplierDeuList'])->name('supplierdue.list');
    // latest product
});

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

// custom authonticat
Route::controller(UserController::class)->group(function () {
    // login view
    Route::get('/', [UserController::class, 'loginView'])->name('login.view');
    // login post systme
    Route::post('/login', [UserController::class, 'loginPost'])->name('login.post');
    // logout system
    Route::get('/logout', [UserController::class, 'logout'])->prefix('/admin')->name('user.logout');
    // forget password view
    Route::get('/forget-view', [UserController::class, 'forgetView'])->name('forget.view');
    // forget post
    Route::post('/forget-post', [UserController::class, 'forgetPost'])->name('forget.post');
    // veryfy otp
    Route::get('/veryfy-otp-view', [UserController::class, 'veryfyOpt'])->name('veryfyOpt');
    // veryfy otp post
    Route::post('/veryfy-otp-post', [UserController::class, 'veryfyOptPost'])->name('veryfyPost.otp');
    // change password view
    Route::get('/change-paview', [UserController::class, 'changePwdView'])->name('changepwd.view');
    // change password
    Route::post('/change-password', [UserController::class, 'changePwd'])->name('change.password');
    // user profile
    Route::get('/profile-view', [UserController::class, 'profile'])->name('user.profile');
    // update profile
    Route::post('/update-profile', [UserController::class, 'updatePfile'])->name('profile.update');
});


// category route API
Route::middleware('customauth')->prefix('/admin')->group(function () {
    Route::get('/create-category', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/store-category', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/index-category', [CategoryController::class, 'index'])->name('index.category');
    Route::get('/edit-category/{category}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/update-category/{category}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/destroy-category/{category}', [CategoryController::class, 'destroy'])->name('destroy.category');
});

// customer route API
Route::middleware('customauth')->prefix('/admin')->group(function () {
    Route::get('/create-customer', [CustomerController::class, 'create'])->name('create.customer');

    Route::post('/store-customers', [CustomerController::class, 'store'])->name('store.customer');

    Route::get('/index-customer', [CustomerController::class, 'index'])->name('index.customer');
    Route::get('/edit-customer/{customer}', [CustomerController::class, 'edit'])->name('edit.customer');

    Route::get('/show-customer/{customer}', [CustomerController::class, 'show'])->name('show.customer');

    Route::post('/update-customer/{customer}', [CustomerController::class, 'update'])->name('update.customer');

    Route::get('/destroy-customer/{customer}', [CustomerController::class, 'destroy'])->name('destroy.customer');
});

// customer receive money API
Route::middleware('customauth')->prefix('/admin')->group(function () {
    Route::get('/create-money', [CustomerReceiveMoneyController::class, 'create'])->name('create.customerMoney');

    Route::post('/store-money', [CustomerReceiveMoneyController::class, 'store'])->name('store.customerMoney');

    Route::get('/index-money', [CustomerReceiveMoneyController::class, 'index'])->name('index.customerMoney');

    Route::get('/edit-customer-money/{customerReceiveMoney}', [CustomerReceiveMoneyController::class, 'edit'])->name('edit.customerMoney');

    Route::post('/update-money/{customerReceiveMoney}', [CustomerReceiveMoneyController::class, 'update'])->name('update.customerMoney');

    Route::get('/destroy-money/{customerReceiveMoney}', [CustomerReceiveMoneyController::class, 'destroy'])->name('destroy.customerMoney');
});

// supplier API
Route::middleware('customauth')->prefix('/admin')->group(function () {
    Route::get('/create-supplier', [SupplierController::class, 'create'])->name('create.supplier');
    Route::post('/store-supplier', [SupplierController::class, 'store'])->name('store.supplier');
    Route::get('/index-supplier', [SupplierController::class, 'index'])->name('index.supplier');
    Route::get('/edit-supplier/{supplier}', [SupplierController::class, 'edit'])->name('edit.supplier');

    Route::get('/show-supplier/{supplier}', [SupplierController::class, 'show'])->name('show.supplier');

    Route::post('/update-supplier/{supplier}', [SupplierController::class, 'update'])->name('update.supplier');

    Route::get('/destroy-supplier/{supplier}', [SupplierController::class, 'destroy'])->name('destroy.supplier');
});

// supplier paymen API
Route::middleware('customauth')->prefix('/admin')->group(function () {
    Route::get('/create-smoney', [SupplierPaymentController::class, 'create'])->name('create.smoney');

    Route::post('/store-smoney', [SupplierPaymentController::class, 'store'])->name('store.smoney');

    Route::get('/index-smoney', [SupplierPaymentController::class, 'index'])->name('index.smoney');

    Route::get('/edit-smoney/{supplierPayment}', [SupplierPaymentController::class, 'edit'])->name('edit.smoney');

    Route::post('/update-smoney/{supplierPayment}', [SupplierPaymentController::class, 'update'])->name('update.smoney');

    Route::get('/destroy-smoney/{supplierPayment}', [SupplierPaymentController::class, 'destroy'])->name('destroy.smoney');
});

// product API
Route::middleware('customauth')->prefix('/admin')->group(function () {
    Route::get('/create-product', [ProductController::class, 'create'])->name('create.producct');

    Route::post('/store-product', [ProductController::class, 'store'])->name('store.producct');

    Route::get('/index-product', [ProductController::class, 'index'])->name('index.producct');

    Route::get('/edit-product/{product}', [ProductController::class, 'edit'])->name('edit.producct');

    Route::post('/update-product/{product}', [ProductController::class, 'update'])->name('update.producct');

    Route::get('/destroy-product/{product}', [ProductController::class, 'destroy'])->name('destroy.producct');
});

// expensive API
Route::middleware('customauth')->prefix('/admin')->group(function () {
    Route::get('/create-expensive', [ExpensiveController::class, 'create'])->name('create.expensive');

    Route::post('/store-expensive', [ExpensiveController::class, 'store'])->name('store.expensive');

    Route::get('/index-expensive', [ExpensiveController::class, 'index'])->name('index.expensive');

    Route::get('/edit-expensive/{expensive}', [ExpensiveController::class, 'edit'])->name('edit.expensive');

    Route::post('/update-expensive/{expensive}', [ExpensiveController::class, 'update'])->name('update.expensive');

    Route::get('/destroy-expensive/{expensive}', [ExpensiveController::class, 'destroy'])->name('destroy.expensive');
});

// sale item
Route::middleware('customauth')->prefix('/admin')->group(function () {
    Route::get('/create-sale', [SaleController::class, 'saleItem'])->name('sale.create');
    Route::post('/store-customer', [SaleController::class, 'storeCustomerModal']);
});

// create invoice API
Route::middleware('customauth')->prefix('/admin')->group(function () {
    Route::get('/create-invoice', [InvoiceController::class, 'create'])->name('create.invoice');
    Route::post('/store-invoice', [InvoiceController::class, 'store']);

    Route::get('/index-invoice', [InvoiceController::class, 'index'])->name('index.invoice');
    Route::get('/edit-invoice/{invoice}', [InvoiceController::class, 'edit'])->name('edit.invoice');

    Route::post('/show-invoice', [InvoiceController::class, 'show']);

    Route::get('/destroy-invoice/{invoice}', [InvoiceController::class, 'destroy'])->name('destroy.invoice');
});

// return invoice API
Route::middleware('customauth')->prefix('/admin')->group(function () {
    Route::get('/create-return', [ReturnInvoiceController::class, 'create'])->name('create.return');
    Route::post('/store-return', [ReturnInvoiceController::class, 'store'])->name('store.return');
    Route::get('/index-return', [ReturnInvoiceController::class, 'index'])->name('index.return');
    Route::get('/edit-return/{returnInvoice}', [ReturnInvoiceController::class, 'edit'])->name('edit.return');
    Route::post('/update-return/{returnInvoice}', [ReturnInvoiceController::class, 'update'])->name('update.return');

    Route::get('/destroy-return/{returnInvoice}', [ReturnInvoiceController::class, 'destroy'])->name('destroy.return');
});
