@extends('fontend.layouts.master')

@section('title', 'momoQR')
<link rel="stylesheet" href="{{url('fontend')}}/css/home.css">

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        {{-- THANH TOÁN KHI NHẬN HÀNG --}}
        <div class="col-md-6">
            
            <form action="" method="POST" target="_blank"style=" box-shadow: 0 0 10px rgb(174, 152, 152)">
                @csrf
                <p class="pt-2" style="text-align: center">THÔNG TIN ĐẶT HÀNG</p>
                <div class="form-label-group ml-2">
                    <input type="text" id="inputName" value="{{ Auth::user()->name }}" class="form-control"
                        placeholder="Nhập họ và tên" required autofocus>
                </div>
                <div class="form-label-group ml-2">
                    <input type="text" id="inputPhone" value="" class="form-control" placeholder="Nhập số điện thoại"
                        name="phone" required>
                </div>
                <div class="form-label-group ml-2">
                    <input type="email" id="inputEmail" value="{{ Auth::user()->email }}" class="form-control"
                        placeholder="Nhập địa chỉ email" name="email" required>
                </div>
                <div class="form-label-group ml-2">
                    <input type="text" id="inputAddress" value="" class="form-control"
                        placeholder="Nhập Địa chỉ giao hàng" name="address" required>
                </div>
                <div class="form-label-group ml-2">
                    <textarea type="text" id="inputNote" value="note" class="form-control"
                        placeholder="Nhập ghi chú (Nếu có)" name="note"></textarea>
                </div>
                <div class="form-check">
                    <label class="form-check-label ml-2">
                        <input type="checkbox" class="form-check-input" name="status" id="" value="0" checked>
                        xác nhận thanh toán khi nhận hàng
                    </label>
                </div>
                <div class="text-center">
                <input type="submit" value="Thanh toan" name="momo"
                    class="mt-2 mb-2  btn-warning btn btn-lg btn-checkout text-uppercase text-white " style="width: 96%">
                </div>
                    <div class="option mt-2">
                    <p class="text-center note-before-checkout">(Vui lòng kiểm tra lại đơn hàng trước khi Đặt Mua)</p>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>



@stop