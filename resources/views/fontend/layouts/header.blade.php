<!-- header -->
<nav class="navbar navbar-expand-md bg-white navbar-light">
    <div class="container">
        <!-- logo  -->
        {{-- <a class="navbar-brand" href="{{ route('user.home') }}" style="color: #CF111A;"><b>shop</b>book</a> --}}

        <a href="{{ route('user.home') }}"><img src="{{url('fontend')}}/images/logo-header-5.png" width="150px"
                height="100px" alt=""></a>
        <!-- navbar-toggler  -->
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <!-- form tìm kiếm  -->
            <form action="{{URL::to('/search')}}" class="form-inline ml-auto my-2 my-lg-0 mr-3" method="get">
                @csrf
                <div class="input-group" style="width: 520px;">
                    <input type="text" class="form-control" aria-label="Small" name="keyword"
                        placeholder="Nhập sách cần tìm kiếm...">
                    <div class="input-group-append">
                        <button type="submit" class="btn" style="background-color: #CF111A; color: white;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>


            <!-- ô đăng nhập đăng ký giỏ hàng trên header đã chuyển vào components/cart-amount.blade  -->
            {{--
            <x-cart-Amount /> --}}
            <!-- ô đăng nhập đăng ký giỏ hàng trên header   -->
            <ul class="navbar-nav mb-1 ml-auto">
                <div class="dropdown">
                    @if(Auth::check())
                    <li class="nav-item account" type="button" class="btn dropdown" data-toggle="dropdown">
                        <a href="#" class="btn btn-secondary rounded-circle">
                            <i class="fa fa-user"></i>
                        </a>
                        <a class="nav-link text-dark text-uppercase" href="#" style="display:inline-block">
                            {{ Auth::user()->name }}</b></a>
                    </li>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach ($userNew as $value)
                        <a href="{{route('user.update',$value->id)}}" class=" mb-2 dropdown-item nutdangnhap text-center fas  "
                        href="{{route('user')}}">
                        Thông tin
                        </a> 
                        @endforeach
                        <a class="  dropdown-item nutdangnhap text-center fas  "
                            href="{{route('user.checkOrder')}}">
                            Đơn Hàng</a>
                            <a class="mt-2 dropdown-item nutdangnhap text-center fas fa-sign-out-alt "
                            href="{{route('user.logout')}}">Đăng
                            Xuất</a>
                        @else
                        <li class="nav-item account" type="button" class="btn dropdown" data-toggle="dropdown">
                            <a href="#" class="btn btn-secondary rounded-circle">
                                <i class="fa fa-user"></i>
                            </a>
                            <a class="nav-link text-dark text-uppercase" href="#" style="display:inline-block">
                                Tài Khoản</a>
                        </li>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item nutdangnhap text-center fas fa-sign-out-alt mb-2 "
                                href="{{route('user.login')}}">Đăng
                                Nhập</a>
                            <a class="dropdown-item nutdangnhap text-center fas fa-sign-out-alt "
                                href="{{route('user.register')}}">Đăng
                                Ký</a>
                            @endif
                        </div>
                    </div>
                    <li class="nav-item giohang">
                        <a href="{{ route('cart.show') }}" class="btn btn-secondary rounded-circle">
                            <i class="fa fa-shopping-cart"></i>
                            <div class="cart-amount">{{ $cart->getTotalQty() }} </div>
                        </a>
                        <a class="nav-link text-dark giohang text-uppercase" href="{{ route('cart.show') }}"
                            style="display:inline-block">Giỏ
                            Hàng
                        </a>
                    </li>
            </ul>
            {{-- <ul class="navbar-nav mb-1 ml-auto">
                <div class="dropdown">
                    <li class="nav-item account" type="button" class="btn dropdown" data-toggle="dropdown">
                        <a href="#" class="btn btn-secondary rounded-circle">
                            <i class="fa fa-user"></i>
                        </a>
                        <a class="nav-link text-dark text-uppercase" href="#" style="display:inline-block">Tài
                            khoản</a>
                    </li>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item nutdangnhap text-center mb-2" href="{{route('user.login')}}">Đăng
                            Nhập</a>
                        @if(Auth::check())
                        <a class="dropdown-item nutdangky text-center" href=" {{route('user.logout')}}">Đăng
                            xuất</a>
                        @else
                        <a class="dropdown-item nutdangnhap text-center" href="{{route('user.register')}}">Đăng
                            Ký</a>
                        @endif
                    </div>
                </div>
                <li class="nav-item giohang">
                    <a href="{{ route('cart.show') }}" class="btn btn-secondary rounded-circle">
                        <i class="fa fa-shopping-cart"></i>
                        <x-cart-Amount />

                    </a>
                    <a class="nav-link text-dark giohang text-uppercase" href="gio-hang.html"
                        style="display:inline-block">Giỏ
                        Hàng</a>
                </li>
            </ul> --}}
        </div>
    </div>
</nav>