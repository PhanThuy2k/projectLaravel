@extends('fontend.pages.master')
@section('content')
{{-- hiển thi khi nhập sai tài khoản --}}
@if (\Session::has('err'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('err') !!}</li>
    </ul>
</div>
@endif

{{-- hiển thi khi đăng ký thành công --}}
@if (\Session::has('success'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif

{{-- hiển thị khi chưa đăng nhâp để mua hàng  --}}
@if (\Session::has('mess'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('mess') !!}</li>
    </ul>
</div>
@endif

<body class="hold-transition login-page" cz-shortcut-listen="true">
    <div class="login-box">

        <div class="login-box-body">

            <h3 class="login-box-msg">Đăng Nhập</b></h3>
            <form action="" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Nhập Email" name="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Nhập Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label class="">
                                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                    style="position: relative;"><input type="checkbox"
                                        style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                        class="iCheck-helper"
                                        style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div> 
                                <a href="{{ route('user.forgetPass') }}">Quên mât khẩu</a>
                            </label>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng Nhập
                            </button>
                    </div>

                </div>
            </form>
            <div class="social-auth-links text-center">
                <p>- hoặc -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>Đăng nhập bằng
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng nhập bằng
                    Google+</a>
            </div>

            <a href="{{route('user.register')}}" class="text-center">Chưa có tài khoản</a>
        </div>

    </div>

    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
                    $('input').iCheck({
                      checkboxClass: 'icheckbox_square-blue',
                      radioClass: 'iradio_square-blue',
                      increaseArea: '20%' /* optional */
                    });
                  });
    </script>
</body>
</form>
@stop