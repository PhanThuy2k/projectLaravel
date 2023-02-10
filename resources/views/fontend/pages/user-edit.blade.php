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
{{-- hien thi validate --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div> 
@endif 
<div class="container"> 
    <div class="row">
        <div class="col-sm-3"></div>

        <div class="col-sm-6">
            <form action="" method="POST" class="bg-light mt-5 mb-5" style=" box-shadow: 0 0 10px rgb(174, 152, 152);">
               @csrf
                <p class="pt-2" style="text-align: center">THÔNG TIN KHÁCH HÀNG</p>
                <div class="form-group pl-2 pr-2">
                  <label for="">Địa chỉ email (Địa chỉ email không thể thay đổi)</label>
                  <input type="text"
                    class="form-control" value="{{ Auth::user()->email }}" name="" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group pl-2 pr-2">
                    <label for="">Họ và tên</label>
                    <input type="text"
                      class="form-control" name="name" value="{{ Auth::user()->name }}" id="" aria-describedby="helpId" placeholder="">
                  </div>
                  <button type="submit" class="btn btn-primary ml-2 mb-2">Cập nhật</button> 
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

@stop
