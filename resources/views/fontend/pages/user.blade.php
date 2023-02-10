@extends('fontend.layouts.master')

@section('title', 'Home')
@section('body')
<link rel="stylesheet" href="{{url('fontend')}}/css/sach-moi-tuyen-chon.css">
<!-- code cho nut like share facebook  -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0">
</script>
<!-- thanh "danh muc sach" đã được ẩn bên trong + hotline + ho tro truc tuyen -->
<section class="duoinavbar">
    <div class="container text-white">
        <div class="row justify">
            <div class="col-lg-3 col-md-5">
                <div class="categoryheader">
                    <div class="noidungheader text-white">
                        <i class="fa fa-bars"></i>
                        <span class="text-uppercase font-weight-bold ml-1">Danh mục sách</span>
                    </div>
                    <!-- CATEGORIES -->
                    <div class="categorycontent">
                        <ul>
                            @foreach($category as $value)
                            <li> <a href="{{ route('user.detail',$value->id) }}"> {{ $value->name
                                    }}</a><i class="fa fa-chevron-right float-right"></i>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 ml-auto contact d-none d-md-block">
                <div class="benphai float-right">
                    <div class="hotline">
                        <i class="fa fa-phone"></i>
                        <span>Hotline:<b>1900 1999</b> </span>
                    </div>
                    <i class="fas fa-comments-dollar"></i>
                    <a href="#">Hỗ trợ trực tuyến </a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>

        <div class="col-sm-6">
            <h5>Thông tin người dùng</h5>
            @foreach ($user as $value)
            <a href="{{route('user.update',$value->id)}}" class="btn btn-warning btn-sm "
                onclick="return confirm('Bạn có chắc muốn sửa không không?')">Sửa thông tin</a></td>
            @endforeach 
            {{-- <form action="" class="bg-light mt-5 mb-5" style=" box-shadow: 0 0 10px rgb(174, 152, 152);">
                <p class="pt-2" style="text-align: center">THÔNG TIN KHÁCH HÀNG</p>
                <div class="form-group pl-2 pr-2">
                  <label for="">Địa chỉ email</label>
                  <input type="text"
                    class="form-control" value="{{ Auth::user()->email }}" name="" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group pl-2 pr-2">
                    <label for="">Họ và tên</label>
                    <input type="text"
                      class="form-control" name="" value="{{ Auth::user()->name }}" id="" aria-describedby="helpId" placeholder="">
                  </div>
                  <a href="{{route('user.update',$value->id)}}" class="btn btn-warning btn-sm ml-2 mb-2  "
                    onclick="return confirm('Bạn có chắc muốn sửa không không?')">Sửa thông tin</a></td>
            </form> --}}
        </div>
        <div class="col-sm-3"></div>

    </div>
</div>

@stop