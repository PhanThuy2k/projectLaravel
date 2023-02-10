@extends('backend.layouts.master')
@section('content')

{{-- header phần content --}}
<section class="content-header">
    <h1>
        orderDetail
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>
{{-- tìm kiếm --}}
<div class="box-header">
    <h3 class="box-title">Responsive Hover Table</h3>
    <div class="box-tools">
        <form action="" method="get">
            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                <input type="text" name="keyword" class="form-control pull-right" placeholder="Search">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<section class="invoice">

    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> Admin
                <small class="pull-right">Date:16/11/2000</small>
            </h2>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Quantity</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>image</th>
                        <th>Total</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderDetail as $value)
                    <tr>
                        <td>{{ $value->quantity }}</td>
                        <td>{{ $value->productName->name }}</td>
                        <td>{{ $value->price }}</td>
                        <td><img src="{{url('upload')}}/{{$value->productName->image}}" width="100px" alt=""></td>
                        <td>{{number_format($value->price * $value->quantity , 0, '.', '.') }}</td>
                        <td> <a href="{{ route('detail.delete',$value['id']) }}" class="btn btn-sm btn-danger">xóa</a>
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="" method="POST">
                @csrf
                <select class="form-control" style="margin-bottom:10px" name="status">
                    <option value="1">đang xử lí</option>
                    <option value="2">đã hoàn thành</option>
                </select>
                <button type="submit" class="btn btn-primary ">Update</button>
            </form>
        </div>
    </div>`
</section>
@stop