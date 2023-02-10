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

<!-- giao diện giỏ hàng  -->
<section class="content my-3">
    <div class="container">
        <div class="cart-page bg-white">
            <div class="row">
                <!-- giao diện giỏ hàng khi không có item  -->
                <div class="col-12 cart-empty d-none">
                    <div class="py-3 pl-3">
                        <h6 class="header-gio-hang">GIỎ HÀNG CỦA BẠN <span>(0 sản phẩm)</span></h6>
                        <div class="cart-empty-content w-100 text-center justify-content-center">
                            <img src="{{url('fontend')}}/images/shopping-cart-not-product.png"
                                alt="shopping-cart-not-product">
                            <p>Chưa có sản phẩm nào trong giở hàng của bạn</p>
                            <a href="index.html" class="btn nutmuathem mb-3">Mua thêm</a>
                        </div>
                    </div>
                </div>

                <!-- giao diện giỏ hàng khi có hàng đã chuyển đến components/cart -->
                {{-- <x-cart-checkOut /> --}}
                {{-- giao diện giỏ hàng khi đã có hàng --}}
<div class="col-md-8 cart">
    @foreach($cart->getItems() as $item)
    <div class="cart-content py-3 pl-3">
        <h6 class="header-gio-hang">Số lượng sản phẩm mua <span>{{$item['quantity']}}</span></h6>
        <div class="cart-list-items">
            <div class="cart-item d-flex">
                <a href="product-item.html" class="img">
                    <img src="{{url('upload')}}/{{$item['image']}}" class="img-fluid" alt="anhsp1">
                </a>
                <div class="item-caption d-flex w-100">
                    <div class="item-info ml-3">
                        <a href="product-item.html" class="ten">{{$item['name']}}</a>
                        <div class="soluong d-flex">
                            <div class="input-number input-group mb-3">
                                <input type="text" name="quantity" value="{{$item['quantity']}}"
                                    class="soluongsp  text-center">
                            </div>
                        </div>
                    </div>
                    <div class="item-price ml-auto d-flex flex-column align-items-end">
                        <div class="giamoi">{{ number_format($item['price'], 0, '.', ',') }} ₫</div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-5 offset-md-4">
                <div class="tonggiatien">
                    <div class="group d-flex justify-content-between">
                        <p class="label">Giá sách:</p>
                        <p class="tamtinh">{{ number_format($item['price'], 0, '.', '.') }} ₫</p>
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
                        <p class="phidicvu">{{number_format($item['price']*$item['quantity'], 0, '.', '.')}} ₫</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="group d-flex justify-content-between align-items-center">
        <strong class="text-uppercase">tổng cộng tiền thanh toán:</strong>
        <h5 class="tongcong">{{number_format($cart->getTotalPrice() , 0, '.', '.') }}</h5>
    </div>

    <small class="note d-flex justify-content-end text-muted ">
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
                                        <span class="label">Chọn phương thức thanh toán</span>
                                        <i class="fa fa-chevron-right float-right"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="step1contentid" class="collapse in" role="tabpanel" aria-labelledby="step1header"
                                class="stepscontent">
                                <div class="card-body p-0">

                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-dangnhap" role="tabpanel"
                                            aria-labelledby="nav-dangnhap-tab">
                                            <form id="form-signin-cart" class="form-signin mt-2">
                                                <a href="{{ route('momo') }}"
                                        class="mb-2 btn btn-danger btn btn-lg btn-block btn-checkout text-uppercase text-white">
                                        Thanh toan bằng MoMo
                                    </a>
                                    <a href="{{ route('user.paymentoffline') }}"
                                        class="mb-2 btn btn-danger btn btn-lg btn-block btn-checkout text-uppercase text-white">
                                        Thanh toan khi nhận hàng
                                    </a>
                                            </form>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>








                </div>
                <!-- het row  -->
            </div>
            <!-- het cart-page  -->
        </div>
        <!-- het container  -->
</section>
@stop