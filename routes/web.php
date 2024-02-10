<?php
// namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;




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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Products
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('update');
        Route::get('/delete/{product}', [ProductController::class, 'destroy'])->name('destroy');
        Route::get('/get-product-price/{id}', [ProductController::class, 'getPrice'])->name('get-product-price');
        Route::get('/get-product-cost/{id}', [ProductController::class, 'getCost'])->name('get-product-cost');
    });

    // Categories
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    // Brands
    Route::group(['prefix' => 'brands', 'as' => 'brands.'], function () {
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::get('/create', [BrandController::class, 'create'])->name('create');
        Route::post('/store', [BrandController::class, 'store'])->name('store');
        Route::get('/edit/{brand}', [BrandController::class, 'edit'])->name('edit');
        Route::put('/{brand}', [BrandController::class, 'update'])->name('update');
        Route::get('/delete/{brand}', [BrandController::class, 'destroy'])->name('destroy');
    });

    // Unit
    Route::group(['prefix' => 'units', 'as' => 'units.'], function () {
        Route::get('/', [UnitController::class, 'index'])->name('index');
        Route::get('/create', [UnitController::class, 'create'])->name('create');
        Route::post('/store', [UnitController::class, 'store'])->name('store');
        Route::get('/edit/{unit}', [UnitController::class, 'edit'])->name('edit');
        Route::put('/{unit}', [UnitController::class, 'update'])->name('update');
        Route::get('/delete/{unit}', [UnitController::class, 'destroy'])->name('destroy');
    });

    // Suppliers
    Route::group(['prefix' => 'suppliers', 'as' => 'suppliers.'], function () {
        Route::get('/', [SupplierController::class, 'index'])->name('index');
        Route::get('/create', [SupplierController::class, 'create'])->name('create');
        Route::post('/store', [SupplierController::class, 'store'])->name('store');
        Route::get('/edit/{supplier}', [SupplierController::class, 'edit'])->name('edit');
        Route::put('/{supplier}', [SupplierController::class, 'update'])->name('update');
        Route::get('/delete/{supplier}', [SupplierController::class, 'destroy'])->name('destroy');
    });

    // Stocks
    Route::group(['prefix' => 'stocks', 'as' => 'stocks.'], function () {
        Route::get('/', [StockController::class, 'index'])->name('index');
        Route::get('/create', [StockController::class, 'create'])->name('create');
        Route::get('/viewPurchase/{stock}', [StockController::class, 'viewPurchase'])->name('viewPurchase');
        Route::post('/store', [StockController::class, 'store'])->name('store');
        Route::get('/edit/{stock}', [StockController::class, 'edit'])->name('edit');
        Route::put('/{stock}', [StockController::class, 'update'])->name('update');
        Route::get('/delete/{stock}', [StockController::class, 'destroy'])->name('destroy');
    });

    // Purchases
    Route::group(['prefix' => 'purchases', 'as' => 'purchases.'], function () {
        Route::get('/', [PurchaseController::class, 'index'])->name('index');
        Route::get('/create', [PurchaseController::class, 'create'])->name('create');
        Route::post('/store', [PurchaseController::class, 'store'])->name('store');
        Route::get('/show/{purchase}', [PurchaseController::class, 'show'])->name('show');
        Route::get('/delete/{purchase}', [PurchaseController::class, 'destroy'])->name('destroy');
        Route::get('/pending', [PurchaseController::class, 'pending'])->name('pending');
        Route::get('/approve/{purchase}', [PurchaseController::class, 'approve'])->name('approve');
        Route::get('/approveAll/{purchase}', [PurchaseController::class, 'approveAll'])->name('approveAll');
    });

    // Orders
    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::get('/show/{order}', [OrderController::class, 'show'])->name('show');
        Route::get('/delete/{order}', [OrderController::class, 'destroy'])->name('destroy');
        Route::get('/pending', [OrderController::class, 'pending'])->name('pending');
        Route::get('/approve/{order}', [OrderController::class, 'approve'])->name('approve');
        Route::get('/approveAll/{order}', [OrderController::class, 'approveAll'])->name('approveAll');
    });

    // Customers
    Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        Route::post('/store', [CustomerController::class, 'store'])->name('store');
        Route::get('/edit/{customer}', [CustomerController::class, 'edit'])->name('edit');
        Route::put('/{customer}', [CustomerController::class, 'update'])->name('update');
        Route::get('/delete/{customer}', [CustomerController::class, 'destroy'])->name('destroy');
    });

    // Other controllers...
});
