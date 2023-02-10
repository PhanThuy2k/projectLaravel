@extends('fontend.layouts.master')

@section('title', 'Home')
@section('body')
<link rel="stylesheet" href="{{url('fontend')}}/css/product-item.css">

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

<!-- breadcrumb  -->
<section class="breadcrumbbar">
    <div class="container">
 
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Trang chủ</a></li>
           
            @foreach($category as $item)
            @if($item->id == $product->category_id)
            <li class="breadcrumb-item"><a href="{{ route('user.detail',$value->id) }}">{{ $item->name }}</a></li>
            @endif
            @break($item->id == $product->category_id)
            @endforeach
            <li class="breadcrumb-item active"><a href="">{{ $product->name }}</a></li>

        </ol>
    </div>
</section>

<!-- nội dung của trang  -->
<section class="product-page mb-4">
    <div class="container">
        <!-- chi tiết 1 sản phẩm -->
        <div class="product-detail bg-white p-4">
            <div class="row">
                <!-- ảnh lớn  -->
                <div class="col-md-5 khoianh">
                    <div class="anhto mb-4">
                        <a class="active" href="{{url('upload')}}/{{$product->image}}" data-fancybox="thumb-img">
                            <img class="product-image" src="{{url('upload')}}/{{$product->image}}"
                                alt="lap-ke-hoach-kinh-doanh-hieu-qua-mt" style="width: 100%;">
                        </a>
                    </div>
                    {{-- ảnh mô tả --}}
                    <div class="list-anhchitiet d-flex mb-4" style="margin-left: 2rem;">
                        @foreach($product->imgs as $value)
                        <img class="thumb-img thumb1 mr-3" src="{{url('uploads')}}/{{$value->image}}" class="img-fluid"
                            alt="lap-ke-hoach-kinh-doanh-hieu-qua-mt">
                        @endforeach
                    </div>
                </div>
                <!-- thông tin sản phẩm: tên, giá bìa giá bán tiết kiệm, các khuyến mãi, nút chọn mua.... -->
                <div class="col-md-7 khoithongtin">

                    <div class="row">
                        <div class="col-md-12 header">
                            <h4 class="ten">{{ $product->name }}</h4>
                            <div class="rate">
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                {{-- <i class="fa fa-star "></i> --}}
                            </div>
                            <hr>
                        </div>
                        <div class="col-md-7">
                            <div class="gia">
                                @if($product->sale_price >0)
                                <div class="giabia">Giá :<span class="giacu ml-2"><del>{{ number_format($product->price,
                                            0, '.', ',' )}} ₫</span></div>
                                <div class="">Giá bán : <span class="giamoi font-weight-bold">{{
                                        number_format($product->sale_price, 0, '.', ',' )}} đ</span><span
                                        class="donvitien "></span></div>
                                <div class="tietkiem">Tiết kiệm: <b></b> <span class="sale1">-20%</span>
                                </div>
                                @else
                                <div class="">Giá bán : <span class="giamoi font-weight-bold">{{
                                        number_format($product->price, 0, '.', ',' )}} đ</span><span
                                        class="donvitien"></span></div>
                                @endif
                            </div>
                            <div class="uudai my-3">
                                <h6 class="header font-weight-bold">Khuyến mãi & Ưu đãi tại DealBook:</h6>
                                <ul>
                                    <li><b>Miễn phí giao hàng </b>cho đơn hàng từ 150.000đ ở TP.HCM và 300.000đ ở
                                        Tỉnh/Thành khác <a href="#">>> Chi tiết</a></li>
                                    <li><b>Combo sách HOT - GIẢM 25% </b><a href="#">>>Xem ngay</a></li>
                                    <li>Tặng Bookmark cho mỗi đơn hàng</li>
                                    <li>Bao sách miễn phí (theo yêu cầu)</li>
                                </ul>
                            </div>
                            <form action="{{ route('cart.add',$product->id) }}" method="POST">
                                @csrf
                                <div class="soluong d-flex">
                                    <label class="font-weight-bold">Số lượng: </label>
                                    <div class="input-number input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text btn-spin btn-dec">-</span>
                                        </div>
                                        <input type="text" value="1" class="soluongsp  text-center" name="quantity">
                                        <div class="input-group-append">
                                            <span class="input-group-text btn-spin btn-inc">+</span>
                                        </div>
                                    </div>
                                </div>
                                <button class="nutmua btn w-100 text-uppercase"> <i class="fa fa-cart-plus"
                                        aria-hidden="true"></i> Thêm vào giỏ hàng</button>
                            </form>
                            <a class="huongdanmuahang text-decoration-none" href="#">(Vui lòng xem hướng dẫn mua
                                hàng)</a>
                            <small class="share">Share: </small>
                            <div class="fb-like" data-href="https://www.facebook.com/DealBook-110745443947730/"
                                data-width="300px" data-layout="button" data-action="like" data-size="small"
                                data-share="true"></div>
                        </div>
                        <!-- thông tin khác của sản phẩm:  tác giả, ngày xuất bản, kích thước ....  -->
                        <div class="col-md-5">
                            <div class="thongtinsach">
                                <p>{!! $product->detail !!}</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- decripstion của 1 sản phẩm: giới thiệu , đánh giá độc giả  -->
                <div class="product-description col-md-9">
                    <!-- 2 tab ở trên  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active text-uppercase" id="nav-gioithieu-tab" data-toggle="tab"
                                href="#nav-gioithieu" role="tab" aria-controls="nav-gioithieu" aria-selected="true">Giới
                                thiệu</a>
                            <a class="nav-item nav-link text-uppercase" id="nav-danhgia-tab" data-toggle="tab"
                                href="#nav-danhgia" role="tab" aria-controls="nav-danhgia" aria-selected="false">Đánh
                                giá của độc giả</a>
                        </div>
                    </nav>
                    <!-- nội dung của từng tab  -->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active ml-3" id="nav-gioithieu" role="tabpanel"
                            aria-labelledby="nav-gioithieu-tab">
                            <h6 class="tieude font-weight-bold">{{ $product->name }}</h6>
                            <p>
                                <span>
                                    {!! $product->description !!}
                                </span>
                            </p>

                        </div>
                        <div class="tab-pane fade" id="nav-danhgia" role="tabpanel" aria-labelledby="nav-danhgia-tab">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <p class="tieude">Đánh giá trung bình</p>
                                    <div class="diem">0/5</div>
                                    <div class="sao">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="sonhanxet text-muted">(0 nhận xét)</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="tiledanhgia text-center">
                                        <div class="motthanh d-flex align-items-center">5 <i class="fa fa-star"></i>
                                            <div class="progress mx-2">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> 0%
                                        </div>
                                        <div class="motthanh d-flex align-items-center">4 <i class="fa fa-star"></i>
                                            <div class="progress mx-2">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> 0%
                                        </div>
                                        <div class="motthanh d-flex align-items-center">3 <i class="fa fa-star"></i>
                                            <div class="progress mx-2">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> 0%
                                        </div>
                                        <div class="motthanh d-flex align-items-center">2 <i class="fa fa-star"></i>
                                            <div class="progress mx-2">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> 0%
                                        </div>
                                        <div class="motthanh d-flex align-items-center">1 <i class="fa fa-star"></i>
                                            <div class="progress mx-2">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> 0%
                                        </div>
                                        <div class="btn vietdanhgia mt-3">Viết đánh giá của bạn</div>
                                    </div>
                                    <!-- nội dung của form đánh giá  -->
                                    <div class="formdanhgia">
                                        <h6 class="tieude text-uppercase">GỬI ĐÁNH GIÁ CỦA BẠN</h6>
                                        <span class="danhgiacuaban">Đánh giá của bạn về sản phẩm này:</span>
                                        <div
                                            class="rating d-flex flex-row-reverse align-items-center justify-content-end">
                                            <input type="radio" name="star" id="star1"><label for="star1"></label>
                                            <input type="radio" name="star" id="star2"><label for="star2"></label>
                                            <input type="radio" name="star" id="star3"><label for="star3"></label>
                                            <input type="radio" name="star" id="star4"><label for="star4"></label>
                                            <input type="radio" name="star" id="star5"><label for="star5"></label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="txtFullname w-100"
                                                placeholder="Mời bạn nhập tên(Bắt buộc)">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="txtEmail w-100"
                                                placeholder="Mời bạn nhập email(Bắt buộc)">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="txtComment w-100"
                                                placeholder="Đánh giá của bạn về sản phẩm này">
                                        </div>
                                        <div class="btn nutguibl">Gửi bình luận</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- het tab nav-danhgia  -->
                    </div>
                    <!-- het tab-content  -->
                </div>
                <!-- het product-description -->
            </div>
            <!-- het row  -->
        </div>
        <!-- het product-detail -->
    </div>
    <!-- het container  -->
</section>
<!-- het product-page -->

<!-- khối sản phẩm tương tự -->
<section class="_1khoi sachmoi">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="row">
                <!--header-->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light pt-4">
                    <h5 class="header text-uppercase" style="font-weight: 400;">Sản phẩm tương tự</h5>
                    <a href="{{ route('user.All') }}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                </div>
            </div>
            <div class="khoisanpham" style="padding-bottom: 2rem;">
                <!-- 1 sản phẩm -->
                @foreach($products as $value)
                <div class="card">
                    <a href="{{ route('user.Information',$value->id) }}" class="motsanpham"
                        style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                        title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                        <img class="card-img-top anh" src="{{url('upload')}}/{{$value->image}}"
                            alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                        <div class="card-body noidungsp mt-3">
                            <h6 class="card-title ten">{{ $value->name }}</h6>
                            <small class="tacgia text-muted"></small>
                            <div class="gia d-flex align-items-baseline">
                                <div class="giamoi">{{ number_format($value->sale_price, 0, '.', ',') }} ₫</div>
                                <div class="giacu text-muted"><del>{{ number_format($value->price, 0, '.', ',') }} ₫
                                </div>
                                <div class="sale">-20%</div>
                            </div>
                            <div class="danhgia">
                                <ul class="d-flex" style="list-style: none;">
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><span class="text-muted">0 nhận xét</span></li>
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
<!-- khối sản phẩm đã xem  -->
<section class="_1khoi combohot mt-4">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="row">
                <!--header-->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                    <h5 class="header text-uppercase" style="font-weight: 400;">Sản phẩm bạn đã xem</h5>
                    <a href="{{ route('user.All') }}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                </div>
            </div>
            <div class="khoisanpham">
                <!-- 1 sản phẩm -->
                @foreach($products as $value)
                <div class="card">
                    <a href="{{ route('user.Information',$value->id) }}" class="motsanpham"
                        style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                        title="Chuyện Nghề Và Chuyện Đời - Bộ 4 Cuốn">
                        <img class="card-img-top anh" src="{{url('upload')}}/{{$value->image}}"
                            alt="combo-chuyen-nghe-chuyen-doi">
                        <div class="card-body noidungsp mt-3">
                            <h6 class="card-title ten">{{ $value->name }}</h6>
                            <small class="tacgia text-muted">{{ $value->author }}</small>
                            <div class="gia d-flex align-items-baseline">
                                <div class="giamoi">{{ number_format($value->sale_price, 0, '.', ',') }} đ
                                </div>
                                <div class="giacu text-muted"><del>{{ number_format($value->price, 0, '.', ',') }} ₫
                                </div>
                                <div class="sale">-20%</div>
                            </div>
                            <div class="danhgia">
                                <ul class="d-flex" style="list-style: none;">
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li class="active"><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><span class="text-muted">0 nhận xét</span></li>
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