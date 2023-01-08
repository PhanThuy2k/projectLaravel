<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('backend')}}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('backend')}}/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{url('backend')}}/css/AdminLTE.css">
  <link rel="stylesheet" href="{{url('backend')}}/css/_all-skins.min.css">
  <link rel="stylesheet" href="{{url('backend')}}/css/jquery-ui.css">
  <link rel="stylesheet" href="{{url('backend')}}/css/style.css" />
  <script src="{{url('backend')}}/css/angular.min.js"></script>
  <script src="{{url('backend')}}/css/app.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    {{-- include header --}}
    @include('backend.layouts.header')

    {{-- include siderbar --}}
    @include('backend.layouts.siderbar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content'){{--nội dung riêng phần index --}}
    </div>
    <!-- /.content-wrapper -->

    {{-- include footer --}}
    @include('backend.layouts.footer')
  </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->

    <script src="{{url('backend')}}/js/jquery.min.js"></script>
    <script src="{{url('backend')}}/js/jquery-ui.js"></script>
    <script src="{{url('backend')}}/js/bootstrap.min.js"></script>
    <script src="{{url('backend')}}/js/adminlte.min.js"></script>
    <script src="{{url('backend')}}/js/dashboard.js"></script>
    <script src="tinymce/tinymce.min.js"></script>
    <script src="tinymce/config.js"></script>
    <script src="{{url('backend')}}/js/function.js"></script>
    @yield('src')
</body>

</html>