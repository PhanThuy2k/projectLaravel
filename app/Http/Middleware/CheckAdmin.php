<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    //  phương thức xử lí luồng
    public function handle(Request $request, Closure $next)
    {
        // chưa có đăng nhập thì chuyển về trang login
        if(!Auth::check()){
            return redirect()->route('admin.login');
            // có rồi thì check nếu role = 1 thì next,#1 thì quay lại
        }else{
            if(Auth::user()->role == 1){
                return $next($request);
            } else{
                return redirect()->back()->with('sai thông tin tài khoản');
            }
        }
        
    }
}
