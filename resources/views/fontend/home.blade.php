@extends('fontend.layouts.master')

@section('title', 'Home')
@section('body')
<link rel="stylesheet" href="{{url('fontend')}}/css/home.css">

<!-- thanh tieu de "danh muc sach" + hotline + ho tro truc tuyen -->
<section class="duoinavbar">
    <div class="container text-white">
        <div class="row justify">
            <div class="col-md-3">
                <div class="categoryheader">
                    <div class="noidungheader text-white">
                        <i class="fa fa-bars"></i>
                        <span class="text-uppercase font-weight-bold ml-1">Danh mục sách</span>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
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
<!-- noi dung danh sach(categories) + banner slider -->
<section class="header bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="margin-right: -15px;">
                <!-- CATEGORIES -->
                <div class="categorycontent">

                    <ul>
                        @foreach($category as $value)
                        <li> <a href="{{ route('user.detail',$value->id) }}"> {{ $value->name }}</a><i
                                class="fa fa-chevron-right float-right"></i>
                        </li>
                        @endforeach
                    </ul>
                </div> 
            </div>
            <!-- banner slider  -->
            <div class="col-md-9 px-0">
                <div id="carouselId" class="carousel slide" data-ride="carousel">
                    <ol class="nutcarousel carousel-indicators rounded-circle">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="#"><img src="fontend/images/banner-1.jpg" class="img-fluid" style="height: 386px;"
                                    width="900px" alt="First slide"></a>
                        </div>
                        <div class="carousel-item">
                            <a href="#"><img src="fontend/images/banner-2.jpg" class="img-fluid" style="height: 386px;"
                                    width="900px" alt="Second slide"></a>
                        </div>
                        <div class="carousel-item">
                            <a href="#"><img src="fontend/images/banner-3.jpg" class="img-fluid" style="height: 386px;"
                                    alt="Third slide"></a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselId" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselId" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- sach tuyển chọn -->
<section class="_1khoi sachmoi bg-white">
    <div class="container">
        <div class="noidung" style=" width: 100%;">
            <div class="row">
                <!--header-->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                    <h1 class="header text-uppercase" style="font-weight: 400;">SÁCH MỚI TUYỂN CHỌN</h1>
                    <a href="{{ route('user.All') }}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                </div>
            </div>
            <div class="khoisanpham" style="padding-bottom: 2rem;">
                @foreach($product as $value)
                <div class="card">
                    <a href="{{ route('user.Information',$value->id) }}" class="motsanpham"
                        style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                        title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                        <img class="card-img-top anh" src="{{ url('upload') }}/{{ $value->image }}"
                            alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                        <div class="card-body noidungsp mt-3">
                            <h3 class="card-title ten">{{ $value->name }}</h3>
                            <small class="tacgia text-muted">{{ $value->author }}</small>
                            <div class="gia d-flex align-items-baseline">
                                <div class="gia d-flex align-items-baseline">
                                    @if($value->sale_price >0)
                                    <div class="giamoi">{{ number_format($value->sale_price, 0, '.', ',') }} ₫</div>
                                    <div class="giacu text-muted"><del>{{ number_format($value->price, 0, '.', ',') }} ₫
                                    </div>
                                    @else
                                    <div class="giamoi">{{ number_format($value->price, 0, '.', ',') }} ₫</div>
                                    @endif
                                </div>

                            </div>
                            <div class="danhgia">
                                <ul class="d-flex" style="list-style: none;">
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    {{-- <li><i class="fa fa-star"></i></li> --}}
                                    <li><span class="text-muted">chưa có đánh giá</span></li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

<!-- sách đang giảm giá  -->
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
            <h5 class="header text-uppercase" style="font-weight: 400;">SÁCH đang giảm giá 20%</h5>
            <a href="{{ route('user.All') }}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
        </div>
    </div>
    <div class="row">
        @foreach($product as $value)
        <div class="col-lg-3 col-sm-4 mt-4 pr-10 pl-10">
            <div class="card">
                <a href="{{ route('user.Information',$value->id) }}" class="motsanpham"
                    style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                    title="Chuyện Nghề Và Chuyện Đời - Bộ 4 Cuốn">
                    <img class="card-img-top anh" src="{{ url('upload') }}/{{ $value->image }}"
                        alt="combo-chuyen-nghe-chuyen-doi">
                    <div class="card-body noidungsp mt-3">
                        <h3 class="card-title ten">{{ $value->name }}</h3>
                        <small class="tacgia text-muted">{{ $value->author }}</small>
                        <div class="gia d-flex align-items-baseline">
                            @if($value->sale_price >0)
                            <div class="giamoi">{{ number_format($value->sale_price, 0, '.', ',') }} ₫</div>
                            <div class="giacu text-muted"><del>{{ number_format($value->price, 0, '.', ',') }} ₫</div>
                            <div class="sale">-20%</div>
                            @else
                            <div class="giamoi">{{ number_format($value->price, 0, '.', ',') }} ₫</div>
                            @endif
                        </div>
                        <div class="danhgia">
                            <ul class="d-flex" style="list-style: none;">
                                <li class="active"><i class="fa fa-star"></i></li>
                                <li class="active"><i class="fa fa-star"></i></li>
                                <li class="active"><i class="fa fa-star"></i></li>
                                <li class="active"><i class="fa fa-star"></i></li>
                                <li class="active"><i class="fa fa-star"></i></li>
                                {{-- <li><i class="fa fa-star"></i></li> --}}
                                <li><span class="text-muted">chưa có đánh giá</span></li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        
    </div>
    <div class="pagination-bar my-3">
        <div class="row">
            <div class="col-12">
                {{$product->links()}}
            </div>
        </div>
    </div>
</div> 

<!--sach sap phathanh  -->
<section class="_1khoi sapphathanh mt-4">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="row">
                <!--header-->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                    <h2 class="header text-uppercase" style="font-weight: 400;">SÁCH SẮP PHÁT HÀNH / ĐẶT TRƯỚC</h2>
                    <a href="{{ route('user.All') }}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                </div>
            </div>
            <div class="khoisanpham">
                @foreach($product as $value)
                <div class="card">
                    <a href="{{ route('user.Information',$value->id) }}" class="motsanpham"
                        style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                        title="Ngoại Giao Của Chính Quyền Sài Gòn">
                        <img class="card-img-top anh" src="{{ url('upload') }}/{{ $value->image }}"
                            alt="ngoai-giao-cua-chinh-quyen-sai-gon">
                        <div class="card-body noidungsp mt-3">
                            <h3 class="card-title ten">{{ $value->name }}</h3>
                            <small class="tacgia text-muted">{{ $value->author }}</small>
                            <div class="gia d-flex align-items-baseline">
                            </div>
                            <div class="danhgia">
                                <ul class="d-flex" style="list-style: none;">
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    {{-- <li><i class="fa fa-star"></i></li> --}}
                                    <li><span class="text-muted">chưa có đánh giá</span></li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@stop