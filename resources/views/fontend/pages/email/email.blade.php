
<h1>Xin Chào {{ $user->name }} </h1>
<p>Mật khẩu của bạn đã được thay đổi </p>
<p>Tên tài khoản: {{ $user->email }}</p>
<p>Mật khẩu mới của bạn là: {{ $pass }}</p>
<p>Ấn vào link sau <a href="{{route('user.login',$user->id)}}">Đăng nhập</a> để chuyển tới trang đăng nhập </p>
    {{-- <a href="{{route('user.changePass',$user->id)}}">Đặt lại mật khẩu</a> --}}
</p> 
 