@extends('backend.layouts.master')
@section('content')

{{-- header phần content --}}
<section class="content-header">
    <h1>
        Order
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

<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <tbody>
            <tr>
                <th>STT</th>
                <th>MDH</th>
                <th>NAME</th>
                <th>PHONE</th>
                <th>STATUS</th>
                <th>TIME</th>
                <th>HOẠT ĐỘNG</th>
            </tr>
            @foreach ($order as $value)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$value->id}}</td>
                <td>{{$value->userName->name}}</td>
                <td>{{$value->phone}}</td>
                @if($value->status ==0)
                <td><span class='label label-danger'>chờ xử lí</span></td>
                @elseif($value->status ==1)
                <td><span class='label label-warning'>đang xử lí</span></td>
                @else
                <td><span class='label label-success'>đã hoàn thành</span></td>
                @endif
                <td>{{$value->created_at}}</td>
                <td><a href="{{route('order.detail',$value->id)}}" class="btn btn-success btn-sm ">Xem chi tiết</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$order->links()}} 
</div>




@stop