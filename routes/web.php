<?php
// use class CategoryController
use App\Http\Controllers\backend\CategoryController;
// use App\Http\Controllers\DasboardController;
use App\Http\Controllers\backend\DasboardController;
// use class ProductController
use App\Http\Controllers\backend\ProductController;
// use class UserCotroller
use App\Http\Controllers\fontend\UserCotroller;
// use class ProductController
use App\Http\Controllers\backend\ProductDetailController;
use Illuminate\Support\Facades\Route;


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
// Định Route user
Route::get('/', function () {
    return view('fontend.index');
})->name('user.index');
// Route tài khoản user
Route::get('/register', [UserCotroller::class, 'register'])->name('user.register');
Route::post('/register', [UserCotroller::class, 'postRegister']);
Route::get('/login', [UserCotroller::class, 'login'])->name('user.login');
Route::post('/login', [UserCotroller::class, 'postlogin']);
Route::get('/logout', [UserCotroller::class, 'logout'])->name('user.logout');
 

// đinh nghĩa route admin group
Route::prefix('/admin')->middleware('admin')->group(function () {
    Route::get('/', [DasboardController::class, 'index'])->name('admin.index');
    // BẢNG CATEGORY
    Route::resource('category', CategoryController::class);
    // BẢNG PRODUCT
    Route::resource('product', ProductController::class);


});
// Route tài khoản admin 
Route::get('/adminLogin', [DasboardController::class, 'login'])->name('admin.login');
Route::post('/adminLogin', [DasboardController::class, 'post']);
Route::get('/adminLogout', [DasboardController::class, 'logout'])->name('admin.logout');

 