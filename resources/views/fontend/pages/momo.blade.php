@extends('fontend.layouts.master')

@section('title', 'momoQR')
<link rel="stylesheet" href="{{url('fontend')}}/css/home.css">

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>

        {{-- <div class="col-md-4">
            <form action="{{route('paymentMomoAtm') }}" method="POST" target="_blank">
                @csrf
                <div class="form-label-group">
                    <input type="text" id="inputName" value="{{ Auth::user()->name }}" class="form-control"
                        placeholder="Nhập họ và tên" required autofocus>
                </div>
                <div class="form-label-group">
                    <input type="text" id="inputPhone" value="" class="form-control" placeholder="Nhập số điện thoại"
                        name="phone" required>
                </div>
                <div class="form-label-group">
                    <input type="email" id="inputEmail" value="{{ Auth::user()->email }}" class="form-control"
                        placeholder="Nhập địa chỉ email" name="email" required>
                </div>
                <div class="form-label-group">
                    <input type="text" id="inputAddress" value="" class="form-control"
                        placeholder="Nhập Địa chỉ giao hàng" name="address" required>
                </div>
                <div class="form-label-group">
                    <textarea type="text" id="inputNote" value="note" class="form-control"
                        placeholder="Nhập ghi chú (Nếu có)" name="note"></textarea>
                </div>

                <input type="submit" value="Thanh toan momo ATM" name="momo"
                    class="mt-2 btn btn-danger btn btn-lg btn-block btn-checkout text-uppercase text-white mb-2">
            </form>
        </div> --}}


        <div class="col-md-6 mb-4 "  >
            {{-- form thanh toán momo  --}}
            <form action="{{route('paymentMomo') }}" method="POST" target="_blank"style=" box-shadow: 0 0 10px rgb(174, 152, 152);" >
                @csrf
                <p class="pt-2" style="text-align: center">THÔNG TIN THANH TOÁN</p>

                <div class="form-label-group pl-2 pr-2">
                    <input type="text" id="inputName" value="{{ Auth::user()->name }}" class="form-control"
                        placeholder="Nhập họ và tên" required autofocus>
                </div>
                <div class="form-label-group pl-2 pr-2">
                    <input type="text" id="inputPhone" value="" class="form-control" placeholder="Nhập số điện thoại"
                        name="phone" required>
                </div>
                <div class="form-label-group pl-2 pr-2">
                    <input type="email" id="inputEmail" value="{{ Auth::user()->email }}" class="form-control"
                        placeholder="Nhập địa chỉ email" name="email" required>
                </div>
                <div class="form-label-group pl-2 pr-2" >
                    <input type="text" id="inputAddress" value="" class="form-control"
                        placeholder="Nhập Địa chỉ giao hàng" name="address" required>
                </div>
                <div class="form-label-group pl-2 pr-2">
                    <textarea type="text" id="inputNote" value="note" class="form-control"
                        placeholder="Nhập ghi chú (Nếu có)" name="note"></textarea>
                </div>
                <div class="form-check ml-2">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="status" id="" value="1" checked>
                        xác nhận thanh toán momo
                    </label>
                </div>
                <div class="form-check ml-2">
                    <input class="form-check-input" type="radio" name="paymentType" id="exampleRadios1"
                        value="atm" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        ATM
                    </label>
                </div>
                <div class="form-check ml-2">
                    <input class="form-check-input" type="radio" name="paymentType" id="exampleRadios2"
                        value="qr">
                    <label class="form-check-label" for="exampleRadios2">
                        QR
                    </label>
                </div>
                {{-- form thanh toán momo QR --}}
                <div class="text-center">
                <input type="submit" value="Thanh toan" name="momo"
                    class="text-center mb-2 mt-2 btn-danger btn btn-lg  btn-checkout text-uppercase text-white" style="width: 96%">
                </div>
                {{-- <input type="submit" value="Thanh toan momo ATM" name="momo"
                    class="mt-2 btn btn-danger btn btn-lg btn-block btn-checkout text-uppercase text-white mb-2"> --}}
            </form>
        </div>

        <div class="col-md-3"></div>
    </div>
</div>



@stop