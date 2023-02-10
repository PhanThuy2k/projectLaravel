<?php

namespace App\Http\Controllers\backend;
// do không cùng cấp với controller nên phải use
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\orderDetail;
// HIỂN THỊ TRANG ADMIN
class DasboardController extends Controller
{
    public function index()
    {
        $category_total = Category::all()->count();
        $product_total = Product::all()->count();
        $orderDetail_total = orderDetail::all()->count();
        $user_total = User::all()->count();
        return view('backend.index',compact('category_total','product_total','orderDetail_total','user_total')); 
    }

    // LOGIN
    public function login()
    {
        return view('backend.pages.admin.adminLogin');
    }
    public function post(Request $req)
    {
        // lấy về mảng
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        // xác thực tài khoản
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.index')->with('success', 'đăng nhập thành công');
        } else{
            return redirect()->back()->with('err', 'sai thông in tài khoản');
        }
    }
    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
