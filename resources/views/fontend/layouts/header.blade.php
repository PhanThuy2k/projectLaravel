<!-- code cho nut like share facebook  -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0">
</script>

<!-- header -->
<nav class="navbar navbar-expand-md bg-white navbar-light">
    <div class="container">
        <!-- logo  -->
        <a class="navbar-brand" href="index.html" style="color: #CF111A;"><b>DealBook</b>.xyz</a>

        <!-- navbar-toggler  -->
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
            data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <!-- form tìm kiếm  -->
            <form class="form-inline ml-auto my-2 my-lg-0 mr-3">
                <div class="input-group" style="width: 520px;">
                    <input type="text" class="form-control" aria-label="Small"
                        placeholder="Nhập sách cần tìm kiếm...">
                    <div class="input-group-append">
                        <button type="button" class="btn" style="background-color: #CF111A; color: white;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- ô đăng nhập đăng ký giỏ hàng trên header  -->
            <ul class="navbar-nav mb-1 ml-auto">
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
                    <a href="gio-hang.html" class="btn btn-secondary rounded-circle">
                        <i class="fa fa-shopping-cart"></i>
                        <div class="cart-amount">0</div>
                    </a>
                    <a class="nav-link text-dark giohang text-uppercase" href="gio-hang.html"
                        style="display:inline-block">Giỏ
                        Hàng</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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