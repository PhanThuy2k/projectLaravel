<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use model
use App\Models\User;
// use hash 
use Illuminate\Support\Facades\Hash;
// use Auth 
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\user\userRequest;

class UserController extends Controller
{
// ĐĂNG KÝ TÀI KHOẢN
    // view đăng ký 
    public function register()
    {
        return view('fontend.pages.register');
    }
    public function postRegister(Request $req)
    {
        // validate dữ liệu
        $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirmPassword' => ['required','same:password']
        ]); 
        // thêm mới đữ liệu
        try {
            $test = User::create([
                'name'=>$req->name,
                'email'=>$req->email,
                // mã hóa mật khẩu thanh chuỗi kí tự
                'password'=>Hash::make($req->password),
            ]);
            return redirect()->route('user.login')->with('success', 'đăng ký thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('err', 'đăng ký thất bại');
        }
    }

// ĐĂNG NHẬP TÀI KHOẢN
    // view đăng nhập
    public function login()
    {
        return view('fontend.pages.login');
    }
    public function postlogin(Request $req)
    {
        // lấy về mảng validate dữ liệu 
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // Security ->Authentication->Login Throttling 
        // tự động giải mã hash password
        // xác thực tài khoản ,Auth:đã cấu hình trong config->auth,attempt($credentials):lấy mảng 
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.home')->with('success', 'đăng nhập thành công');
        } else{
            return redirect()->back()->with('err', 'sai thông in tài khoản');
        }
    }

// TRANG LOGOUT
    public function logout()
    {
        // hủy sesion và return về
        Auth::logout();
        return redirect()->route('user.home');
    }

    // view form thông tin người dùng
    public function user()
    {
        $user = User::all();
        return view('fontend.layouts.header',compact('user'));
    }

    // người dùng sửa thông tin
    public function update(Request $req,$id)
    {
        $user = User::find($id);

        return view('fontend.pages.user-edit',compact('user'));
    }
    public function postupdate(Request $req,$id)
    {

        // dd(2);
        $user = User::find($id)->update([
            'name' => $req->name
        ]);
         $user = User::find($id);
        return view('fontend.pages.user-edit',compact('user'));
    }

}
 