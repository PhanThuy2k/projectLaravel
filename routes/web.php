<?php
// use class CategoryController
use App\Http\Controllers\backend\CategoryController;
// use admin;
use App\Http\Controllers\backend\DasboardController;
// use class ProductController
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\userListController;
// use class UserController
use App\Http\Controllers\fontend\CartController;
use App\Http\Controllers\fontend\HomeController;
use App\Http\Controllers\fontend\EmailController;
// use class ProductController
use App\Http\Controllers\fontend\UserController;
use App\Http\Controllers\payment\PaymentController;
use App\Http\Controllers\fontend\InformationController;
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
// USER
    // trang màn hình chính  
    Route::get('/', [HomeController::class, 'home'])->name('user.home');
    // trang khi ấn vào sản phẩm
    Route::get('/productInformation/{id}', [HomeController::class, 'Information'])->name('user.Information');
    // trang khi xem toàn bộ sản phẩm
    Route::get('/productAll', [HomeController::class, 'All'])->name('user.All');
    // trang khi xem chi tiết danh mục
    Route::get('/categoryDetail/{id}', [HomeController::class, 'detail'])->name('user.detail');
    // trang khi tìm kiếm
    Route::get('/search', [HomeController::class, 'search'])->name('user.search');
    
    // router giỏ hàng
        // hiên thị
    Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
        // thêm
    Route::post('/add-cart/{id}', [CartController::class, 'add'])->name('cart.add');
        // sửa
    Route::post('/update-cart/{id}', [CartController::class, 'update'])->name('cart.update');
        // xóa 
    Route::get('/delete-cart/{id}', [CartController::class, 'delete'])->name('cart.delete');

    // route đặt hàng
        // trang đặt hàng
    Route::get('/checkOut', [CartController::class, 'checkOut'])->name('user.checkOut');
        // trang thanh toán khi nhận hàng
    Route::get('/paymentOffline', [CartController::class, 'paymentoffline'])->name('user.paymentoffline');;
    Route::post('/paymentOffline', [CartController::class, 'postPaymentoffline']);

        // route trang sau khi đã mua hàng
    Route::get('/checkOrder', [CartController::class, 'checkOrder'])->name('user.checkOrder');
    Route::get('/checkOrderDetail/{id}', [CartController::class, 'checkOrderDetail'])->name('user.checkDetail');

    // route trang thanh toán
    Route::post('/PaymentMomo', [PaymentController::class, 'paymentMomo'])->name('paymentMomo');
        // trang thanh toán 
    Route::post('/PaymentMomoAtm', [PaymentController::class, 'paymentMomoAtm'])->name('paymentMomoAtm');
    Route::post('/PaymentMomoQR', [PaymentController::class, 'paymentMomoQR'])->name('paymentMomoQR');
        // view form thanh toan 
    Route::get('/momo', [PaymentController::class, 'momo'])->name('momo');
    Route::get('/postMomo', [PaymentController::class, 'postMomo']);
                                                                                            
    // Route tài khoản user
        // đăng ký
    Route::get('/register', [UserController::class, 'register'])->name('user.register');
    Route::post('/register', [UserController::class, 'postRegister']);
        // đăng nhập
    Route::get('/login', [UserController::class, 'login'])->name('user.login');
    Route::post('/login', [UserController::class, 'postlogin']);
        // đăng xuất
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
        // view thông tin người dùng
    Route::get('/user', [UserController::class, 'user'])->name('user');
        //sửa ngươi dùng 
    Route::get('/user-edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/user-edit/{id}', [UserController::class, 'postupdate'])->name('update');
    
// ADMIN  
// khai báo middwere http->middwere->kernel.php,muốn vào admin bắt buộc đăng nhâp 
Route::prefix('/admin')->middleware('admin')->group(function () {
    Route::get('/', [DasboardController::class, 'index'])->name('admin.index');
    // bảng category
    Route::resource('category', CategoryController::class);
    // bảng product
    Route::resource('product', ProductController::class);
    // bảng order
        // view đơn hàng
    Route::get('/order', [OrderController::class, 'order'])->name('order.index');
        // view chi tiết đơn hàng
    Route::get('/detail/{id}', [OrderController::class, 'orderDetail'])->name('order.detail');
        // update trạng thái đơn hàng
    Route::post('/detail/{id}', [OrderController::class, 'updateStatus']);
        // xóa chi tiết đơn hàng
    Route::get('/delete-detail/{id}', [OrderController::class, 'delete'])->name('detail.delete');
    // bảng user
        // view danh sach người dùng
   Route::get('/userList', [userListController::class, 'userList'])->name('userList.index');
});

// Route tài khoản admin
    // trang login
Route::get('/adminLogin', [DasboardController::class, 'login'])->name('admin.login');
Route::post('/adminLogin', [DasboardController::class, 'post']);
    // trang logout
Route::get('/adminLogout', [DasboardController::class, 'logout'])->name('admin.logout');

// Route chức năng quên mật khẩu
    // click vào link lấy lại mật khẩu chuyển tới form 
Route::get('/forget-password', [EmailController::class, 'forgetPass'])->name('user.forgetPass');
    // ấn gửi email
Route::post('/forget-password', [EmailController::class, 'postForgetPass']);
    // click vào link đc gửi tới chuyển tới form sửa mật khẩu
Route::get('/reset-passWord/{user}/{token}', [EmailController::class, 'resetPassWord'])->name('user.resetPass');
    // reset mật khẩu
Route::post('/reset-passWord/{user}/{token}', [EmailController::class, 'postResetPassWord']);
    // form đổi mật khẩu
Route::get('/change-passWord/{id}', [EmailController::class, 'changePassWord'])->name('user.changePass');
    // đổi mật khẩu
Route::post('/change-passWord/{id}', [EmailController::class, 'PostchangePassWord']);
    // Route gửi mail
Route::get('/email', [EmailController::class, 'email'])->name('email');
    