@extends('backend.layouts.master')
@section('content')
{{-- header phần content --}}
<section class="content-header">
    <h1>
        PRODUCT
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
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('category.update',$category->id) }}" method="POST">
                @method('PUT') 
                @csrf
                <div class="form-group">
                    <label for="text">Name :</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="Enter name"
                        id="name">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id=""
                            {{$category->status==1?'checked':''}} value="1" >
                        Còn hàng
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id=""
                            {{$category->status==0?'checked':''}} value="0" >
                        Hết hàng
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
@stop