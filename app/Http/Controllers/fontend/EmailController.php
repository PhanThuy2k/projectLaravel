<?php

namespace App\Http\Controllers\fontend;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use  App\Http\Requests\password\passwordRequest;
use App\Http\Controllers\fontend\get_data_user;
class EmailController extends Controller
{
    // public function email()

    // {
    //     return view('fontend.pages.email.email');
    // }
    // public function email()
    // {
    //     $name = 'Thủy Phan';
    //     // tên view,biến,hàm
    //     Mail::send('fontend.pages.email.email', compact('name'), function ($email) use ($name) {
    //         // gửi đến email nhận,tên ng nhân
    //         $email->subject('Thay đổi mật khẩu');
    //         $email->to('phanthanhthuy16112k@gmail.com', $name);
    //     });
      
    // } 

    // view form nhập email
    public function forgetPass()
    {
        return view('fontend.pages.email.forget-password');
    }
    // gủi mail
    public function postForgetPass(Request $req)
    {
        $pass = strtoupper(Str::random(10));
        $user = User::Where('email',$req->email)->first();
         // cập nhật   
        $user->update(['password'=>Hash::make($pass),]);
        Mail::send('fontend.pages.email.email', compact('user', 'pass'), function ($email) use ($user) {
                // gửi đến email nhận,tên ng nhân
                $email->subject('Yêu cầu thay đổi mật khẩu');
                $email->to($user->email,$user->name);
            });
            return redirect()->route('user.login')->with('success','Mật khẩu mới đã được gửi tới email của bạn,Vui lòng kiểm tra hộp thư của bạn (bao gồm cả thư rác)');
    }    
    // form đổi mật khẩu
    public function changePassWord()
    {
        return view('fontend.pages.email.chage-pass');
    } 
    // đổi mật khẩu
    public function PostchangePassWord(passwordRequest $passwordRequest,$id)
    { 
        // dd($passwordRequest);
        
        if ($passwordRequest->password == $passwordRequest->password ) {
            $user =  User::find($id);
            // $user->password = bcrypt($passwordRequest->password);
            $user->save();
            return redirect()->back();
        }else{
          echo('lỗi');
        }
        // dd($req);
        // $user = User::find($id);
        // $user = User::Where('email',$req->email)->first();

        // echo ($user->password);
        // // echo "<br>";
        // echo (Hash::make($req->password));
        
        // if ($user->password  === Hash::make($req->password)) {
        //     dd($user);
        //     if ($req->passwordNew === $req->RepasswordNew) {
        //         // $user->update(['password'=>Hash::make($req->passwordNew)]);
        //     }
        // } 
        // try {
        //     $user->updateupdate([
        //         // mã hóa mật khẩu thanh chuỗi kí tự
        //         'password'=>Hash::make($req->password),
        //     ]);
        //     return redirect()->route('user.login')->with('success', 'đăng ký thành công');
        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('err', 'đăng ký thất bại');
        // }
        
    }
}
