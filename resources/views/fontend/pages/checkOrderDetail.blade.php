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

<!-- ảnh banner -->
<section class="banner">
    <div class="container">
        <a href=""><img src="" class="img-fluid"></a>
    </div>
</section>

<!-- nội dung của trang  -->
<section class="account-page my-3">
    <div class="container">
        <div class="page-content bg-white">
            <div class="account-page-tab-content m-4">
                <!-- 2 tab: thông tin tài khoản, danh sách đơn hàng  -->
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" id="nav-donhang-tab" data-toggle="tab" href="#nav-donhang"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Danh sách đơn hàng</a>
                    </div>
                </nav>
                <div class="tab-content">
                    <table class="table">
                        <caption>List of users</caption>
                        <thead>
                            <tr>
                                <th scope="col">giá sản phẩm</th>
                                <th scope="col">số lượng sản phẩm</th>
                                <th scope="col">mã đơn hàng</th>
                                <th scope="col">tên sản phẩm</th>
                                <th scope="col">ảnh sản phẩm</th>
                                <th scope="col">trạng thái</th>
                                <th scope="col">Ngày đặt hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($orderDetail as $value)
                            <tr>  

                                <td>{{number_format($value->price * $value->quantity , 0, '.', '.') }}</td>
                                <td>{{ $value->quantity }}</td>
                                <td>{{ $value->orderName->id }}</td>
                                <td>{{ $value->productName->name }}</td>
                                <td><img src="{{url('upload')}}/{{$value->productName->image}}" width="100px" alt="">
                                </td>
                                @if($value->orderName->status ==1)
                                <td><span class='label label-success'>đã thanh toán</span></td>
                                @else
                                <td><span class='label label-success'>thanh toán khi nhận hàng</span></td>
                                @endif
                                <td>{{ $value->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@stop