<?php

namespace App\Http\Middleware;
use Auth;
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
    public function handle(Request $request, Closure $next)
    {
        // chưa có tài khoản thì chuyển về trang login
        if(!Auth::check()){
            return redirect()->route('admin.login');
            // có rồi thì check nếu role = 1 thì next,#1 thì quay lại
        }else{
            if(Auth::user()->role == 1){
                return $next($request);
            } else{
                return redirect()->back();
            }
        }
        
    }
}
