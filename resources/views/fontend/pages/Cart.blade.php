@extends('fontend.layouts.master')

@section('body')
{{-- link css --}}
<link rel="stylesheet" href="{{url('fontend')}}/css/gio-hang.css">
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
                            <li>
                                <a href="#"> {{ $value->name}}</a><i class="fa fa-chevron-right float-right"></i>
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

<!-- giao diện giỏ hàng  -->
<section class="content my-3">
    <div class="container">
        <div class="cart-page bg-white">
            <div class="row">
                <!-- giao diện giỏ hàng khi không có item  -->
                @if($cart->getTotalQty() <= 0) <div class="col-12 cart-empty">
                    <div class="py-3 pl-3">
                        <h6 class="header-gio-hang">GIỎ HÀNG CỦA BẠN <span>(0 sản phẩm)</span></h6>
                        <div class="cart-empty-content w-100 text-center justify-content-center">
                            <img src="{{url('fontend')}}/images/shopping-cart-not-product.png"
                                alt="shopping-cart-not-product">
                            <p>Chưa có sản phẩm nào trong giở hàng của bạn</p>
                            <a href="{{ route('user.home') }}" class="btn nutmuathem mb-3">Mua thêm</a>
                        </div>
                    </div>
            </div>
            @else
            <!-- giao diện giỏ hàng khi có hàng -->
            {{--
            <x-cart-add /> --}}
            {{-- giao diện giỏ hàng khi có hàng--}}
            <div class="col-md-8 cart">
                @foreach($cart->getItems() as $item)
                <div class="cart-content py-3 pl-3">
                    <h6 class="header-gio-hang">Sản phẩm đã thêm
                        <span>{{$item['quantity']}}</span>
                    </h6>
                    <div class="cart-list-items">
                        <div class="cart-item d-flex">
                            <a href="product-item.html" class="img">
                                <img src="{{url('upload')}}/{{$item['image']}}" class="img-fluid" alt="anhsp1">
                            </a>
                            <div class="item-caption d-flex w-100">
                                <div class="item-info ml-3">
                                    <a href="product-item.html" class="ten">{{$item['name']}}</a>
                                    <div class="soluong d-flex">
                                        <form action="{{ route('cart.update',$item['id']) }}" method="POST">
                                            @csrf
                                            <div class="input-number input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text btn-spin btn-dec">-</span>
                                                </div>
                                                <input type="text" name="quantity" value="{{$item['quantity']}}"
                                                    class="soluongsp  text-center">
                                                <div class="input-group-append">
                                                    <span class="input-group-text btn-spin btn-inc">+</span>
                                                </div>
                                            </div>
                                            <button type="submit" class=" btn-sm btn-warning">Cập nhật</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="item-price ml-auto d-flex flex-column align-items-end">
                                    <div class="giamoi">{{number_format($item['price'], 0, '.', '.')}} ₫</div>
                                    <a href="{{ route('cart.delete',$item['id']) }}"><span class="remove mt-auto"><i
                                                class="far fa-trash-alt"></i></span></a>

                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('user.home') }}" class="btn nutmuathem mb-3">Mua thêm</a>
                        </div>
                        <div class="col-md-5 offset-md-4">
                            <div class="tonggiatien">
                                <div class="group d-flex justify-content-between">
                                    <p class="label">Giá sách:</p>
                                    <p class="tamtinh">{{number_format($item['price'], 0, '.', '.')}} ₫</p>

                                </div>
                                <div class="group d-flex justify-content-between">
                                    <p class="label">Phí vận chuyển:</p>
                                    <p class="phivanchuyen">0 ₫</p>
                                </div>
                                <div class="group d-flex justify-content-between">
                                    <p class="label">Phí dịch vụ:</p>
                                    <p class="phidicvu">0 ₫</p>
                                </div>
                                <div class="group d-flex justify-content-between">
                                    <p class="label">tổng cộng:</p>
                                    <p class="phidicvu">{{number_format($item['price']*$item['quantity'], 0, '.', '.')}}
                                        ₫</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <small class="note d-flex justify-content-end text-muted">
                    (Giá đã bao gồm VAT)
                </small>
            </div>
            <!-- giao diện phần thanh toán nằm bên phải  -->
            <div class="col-md-4 cart-steps pl-0">
                <div id="cart-steps-accordion" role="tablist" aria-multiselectable="true">
                    <!-- bước số 1: đăng nhập hoặc đăng ký -->
                    <div class="card">
                        <div class="card-header cardheader" role="tab" id="step1header">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" data-parent="#cart-steps-accordion" href="#step1contentid"
                                    aria-expanded="true" aria-controls="step1contentid"
                                    class="text-uppercase header"><span class="steps">1</span>
                                    <span class="label">KHÁCH HÀNG MỚI / ĐĂNG NHẬP</span>
                                    <i class="fa fa-chevron-right float-right"></i>
                                </a>
                            </h5>
                        </div>
                        <div id="step1contentid" class="collapse in" role="tabpanel" aria-labelledby="step1header"
                            class="stepscontent">
                            <div class="card-body p-0">
                                <nav>
                                    <div class="nav nav-tabs dangnhap-dangky" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active text-center text-uppercase"
                                            id="nav-dangnhap-tab" data-toggle="tab" href="#nav-dangnhap" role="tab"
                                            aria-controls="nav-dangnhap" aria-selected="true">Đăng
                                            nhập</a>
                                        <a class="nav-item nav-link text-center text-uppercase" id="nav-dangky-tab"
                                            data-toggle="tab" href="#nav-dangky" role="tab" aria-controls="nav-dangky"
                                            aria-selected="false">Đăng ký</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-dangnhap" role="tabpanel"
                                        aria-labelledby="nav-dangnhap-tab">
                                        <form id="form-signin-cart" class="form-signin mt-2">
                                            <a name="" id=""
                                                class="btn btn-lg btn-block btn-signin text-uppercase text-white btn-success"
                                                href="{{ route('user.login') }}" role="button">Đăng NHập</a>
                                            <button class="btn btn-lg btn-google btn-block text-uppercase"
                                                type="submit"><i class="fab fa-google mr-2"></i> Đăng nhập bằng
                                                Google</button>
                                            <button class="btn btn-lg btn-facebook btn-block text-uppercase"
                                                type="submit"><i class="fab fa-facebook-f mr-2"></i> Đăng nhập
                                                bằng Facebook</button>
                                            <a name="" id=""
                                                class="btn btn-lg btn-block btn-signin text-uppercase text-white btn-warning"
                                                href="{{ route('user.checkOut') }}" role="button">Mua Hàng</a>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="nav-dangky" role="tabpanel"
                                        aria-labelledby="nav-dangky-tab">
                                        <form id="form-signup-cart" class="form-signin mt-2">
                                            <a name="" id=""
                                                class="btn btn-lg btn-block btn-signin text-uppercase text-white btn-success"
                                                href="{{ route('user.login') }}" role="button">Đăng Ký</a>

                                            <button
                                                class="btn btn-lg btn-block btn-shopping-without-signup text-uppercase text-white btn-warning ">Mua
                                                hàng không cần đăng ký
                                            </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- het div cart-steps  -->
    </div>
    <!-- het row  -->
    </div>
    <!-- het cart-page  -->
    </div>
    <!-- het container  -->
</section>
@stop