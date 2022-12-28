<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\DasboardController;

// use class CategoryController
use App\Http\Controllers\CategoryController;



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
// đinh nghĩa route admin
Route::get('/admin', [DasboardController::class, 'index'])->name('indexRoute');
// định ngĩa route hiển thị dữ liệu Category
Route::get('/listCategory',[CategoryController::class,'list'])->name('categoryRoute');
// định nghĩa route hiển thị form thêm mới Category
// Route::get('/addCategory',[CategoryController::class,'add'])->name('addCategoryRoute');

// 
Route::get('/', function () {
    return view('front.index');
});



