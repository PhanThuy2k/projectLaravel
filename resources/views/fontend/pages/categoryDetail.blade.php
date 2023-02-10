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
        <a href=""><img src="{{url('fontend')}}/images/banner-detail.jpg" class="img-fluid" style=""></a>
    </div>
</section>

 
<!-- khối sản phẩm  -->
<section class="content my-4">
    <div class="container">
        
        <div class="noidung bg-white" style=" width: 100%;">
            <!-- header của khối sản phẩm : tag(tác giả), bộ lọc và sắp xếp  -->
            <div class="header-khoi-sp d-flex">       
                <div class="sort d-flex ">
                    
                    <div class=" ml-2 mr-2 pt-3">
                        <p>{{ $categorys->name }}</p>
                        
                    </div>
                   
                </div>
            </div>
        </div>
        <!--het div noidung-->
    </div>
    <!--het container-->
</section>
<!-- các sản phẩm  -->
<section class="content my-4">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="items">
                <div class="row">
                    @foreach($product as $value)
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <!-- 1 sản phẩm  -->
                        <div class="card">
                            <a href="{{ route('user.Information',$value->id) }}" class="motsanpham" style="text-decoration: none; color: black;"
                                data-toggle="tooltip" data-placement="bottom" title="">
                                <img class="card-img-top anh" src="{{url('upload')}}/{{$value->image}}"
                                    alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                                <div class="card-body noidungsp mt-3">
                                    <h6 class="card-title ten">{{ $value->name }}</h6>
                                    <small class="tacgia text-muted">{{ $value->author }}</small>
                                    <div class="gia d-flex align-items-baseline">
                                        @if($value->sale_price >0)
                                        
                                        <div class="giamoi">{{ number_format($value->sale_price, 0, '.', ',') }}
₫</div>
                                        <div class="giacu text-muted"><del>{{ number_format($value->price, 0, '.', ',') }} 
 ₫</div>
                                         <div class="sale">-20%</div>
                                        @else
                                        <div class="giacu text-muted"><del>{{ number_format($value->price, 0, '.', ',') }} 
 ₫</div>
                                        @endif
                                    </div>
                                    <div class="danhgia">
                                        <ul class="d-flex" style="list-style: none;">
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <span class="text-muted">0 nhận xét</span>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- pagination bar  -->
            <div class="pagination-bar my-3">
                <div class="row">
                    <div class="col-12">
                        {{$product->links()}}
                    </div>
                </div>
            </div>

            <!--het khoi san pham-->
        </div>
        <!--het div noidung-->
    </div>
    <!--het container-->
</section>

@stop