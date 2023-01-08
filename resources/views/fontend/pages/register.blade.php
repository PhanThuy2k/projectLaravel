@extends('fontend.pages.master')
@section('content')

{{-- hien thi validate --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{{-- hiển thi khi đăng ký thất bại --}}
@if (\Session::has('err'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('err') !!}</li>
    </ul>
</div>
@endif
<form action="" method="POST">
    @csrf

    <body class="hold-transition register-page" cz-shortcut-listen="true">
        <div class="register-box">
            
            <div class="register-box-body">
                <h3 class="login-box-msg">RIGITER</h3>
                <form action="../../index.html" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="name" name="name">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="confirm password"
                            name="confirmPassword">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
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
                                    </div> I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                        </div>

                    </div>
                </form>
                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>
                        Sign up using
                        Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>
                        Sign up using
                        Google+</a>
                </div>
                <a href="{{route('user.login')}}" class="text-center">Sign in as a member</a>
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