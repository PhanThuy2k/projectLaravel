@extends('backend.layouts.master')
@section('content')

{{-- header phần content --}}
<section class="content-header">
  <h1>
    User
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

  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tbody>
        <tr>
          <th>STT</th>
          <th>ID</th>
          <th>Tên</th>
          
        </tr>
        @foreach ($user as $value)
        <tr>
          <td scope="row">{{$loop->iteration}}</td>
          <td>{{$value->id}}</td>
          <td>{{$value->name}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- hiển thị phân trang   -->
  </div>
  @stop