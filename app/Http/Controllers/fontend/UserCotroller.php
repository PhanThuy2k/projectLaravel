<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use model
use App\Models\User;
// use hash 
use Hash;
// use Auth 
use Auth;

class UserCotroller extends Controller
{
// ĐĂNG KÝ TÀI KHOẢN
    public function register()
    {
        return view('fontend.pages.register');
    }
    public function postRegister(Request $req)
    {
        // validate
        $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirmPassword' => ['required','same:password']
        ]);
        try {
            $test = User::create([
                'name'=>$req->name,
                'email'=>$req->email,
                'password'=>Hash::make($req->password),
            ]);

            return redirect()->route('user.login')->with('success', 'đăng ký thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('err', 'đăng ký thất bại');
        }
        
    }

// ĐĂNG NHẬP TÀI KHOẢN
    public function login()
    {
        return view('fontend.pages.login');
    }
    public function postlogin(Request $req)
    {
        // lấy về mảng
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        // xác thực tài khoản
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.index')->with('success', 'đăng nhập thành công');
        } else{
            return redirect()->back()->with('err', 'sai thông in tài khoản');
        }
    }

    // TRANG LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.index');
    }
}
