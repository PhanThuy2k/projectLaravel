<!DOCTYPE html>
<html lang="vi">

<head>
    <title>@yield('title') Dealbook-Mua sách trực tuyến giá rẻ nhất</title>
    <meta name="description"
        content="Mua sách online hay, giá tốt nhất, combo sách hot bán chạy, giảm giá cực khủng cùng với những ưu đãi như miễn phí giao hàng, quà tặng miễn phí, đổi trả nhanh chóng. Đa dạng sản phẩm, đáp ứng mọi nhu cầu.">
    <meta name="keywords" content="nhà sách online, mua sách hay, sách hot, sách bán chạy, sách giảm giá nhiều">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="fontend/css/home.css">
    <script type="text/javascript" src="fontend/js/main.js"></script>
    <link rel="stylesheet" href="fontend/fontawesome_free_5.13.0/css/all.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="fontend/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="fontend/slick/slick-theme.css" />
    <script type="text/javascript" src="fontend/slick/slick.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js">
    </script>
    <link rel="canonical" href="http://dealbook.xyz/">
    <meta name="google-site-verification" content="urDZLDaX8wQZ_-x8ztGIyHqwUQh2KRHvH9FhfoGtiEw" />
    <link rel="apple-touch-icon" sizes="180x180" href="fontend/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fontend/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fontend/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="fontend/favicon_io/site.webmanifest">
    <style>
        img[alt="www.000webhost.com"] {
            display: none;
        }
    </style>
</head>
<body>
    {{-- include header  --}}
    @include('fontend.layouts.header')
    {{-- body --}}
    @yield('body')
    {{-- include information  --}}
    @include('fontend.layouts.information')
    <!-- include footer  -->
    @include('fontend.layouts.footer')
</body>
</html>