@extends('backend.layouts.master')
@section('content')

{{-- header phần content --}}
<section class="content-header">
    <h1>
        CATEGORY
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>
{{-- hiển thị validate --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div> 
@endif
{{-- end header phần content --}}

{{-- status list categoey --}}
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('category.store') }}" method="post">
                {{-- sủa lỗi 419 --}}
                @csrf
                <div class="form-group">
                    <label for="text">Name :</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" id="name">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="" value="1" checked>
                        Còn hàng
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="" value="0">
                        Hết hàng
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
@stop