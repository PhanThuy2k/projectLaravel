<?php

namespace App\Http\Controllers\backend;
// do không cùng cấp với controller nên phải use
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

// HIỂN THỊ TRANG ADMIN
class DasboardController extends Controller
{
    public function index()
    {
        return view('backend.index');
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
