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

{{-- end header phần content --}}
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
<td><a href="{{ route('category.create') }}" class="btn btn-success btn-sm ">Thêm mới</a></td>
<table class="table">
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>STATUS</th>
                    {{-- <th>TOTAL</th> --}}
                    <th>HOẠT ĐỘNG</th>
                </tr>
                @foreach ($categoryIndex as $value)
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>{!!($value->status) ? "<span class='label label-success'>Còn hàng</span>"
                    :"<span class='label label-danger'>Hết hàng</span>"!!}</td>
                {{-- <td>{{$value->totalProducts->count()}}</td> --}}
                <td><a href="{{route('category.edit',$value->id)}}" class="btn btn-warning btn-sm "
                        onclick="return confirm('Bạn có chắc muốn sửa không không?')">Sửa</a></td>
                <td>
                    <form action="{{ route('category.destroy',$value->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit"
                            onclick="return confirm('Bạn có chắc muốn xoá không?')">Xóa</button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$categoryIndex->links()}}  

    </div>




    @stop