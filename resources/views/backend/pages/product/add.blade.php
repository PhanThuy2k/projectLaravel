@extends('backend.layouts.master')
@section('content')

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

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="text">Name :</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter name"
                        id="name">
                </div>
                <div class="form-group">
                    <label for="text">Price :</label>
                    <input type="text" class="form-control" name="price" value="{{old('price')}}"
                        placeholder="Enter Price" id="name">
                </div>
                <div class="form-group">
                    <div>
                        <label for="text">Sale Price :</label>
                        <input type="text" class="form-control" name="sale_price" value="{{old('sale_price')}}"
                            placeholder="Sale Price" id="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Tải ảnh lên:</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1"
                            value="{{old('image')}}" name="file">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Chon ảnh mô tả:</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1"
                            value="{{old('image')}}" name="images[]" multiple>
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
                    <div class="form-row align-items-center">
                        <label for="text">Category Name :</label>
                        <div class="col-auto my-1">
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category_id">
                                @foreach($category as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text">description:</label>
                        <textarea name="editor1" id="editor1" rows="10" cols="80">
                        </textarea>
                        <input type="text" class="form-control" name="description" value="{{old('description')}}"
                            placeholder="" id="name">
                    </div>
                    <div class="form-group">
                        <label for="text">detail:</label>
                        <textarea name="editor2" id="editor2" rows="10" cols="80">
                        </textarea>
                        <input type="text" class="form-control" name="detail" value="{{old('detail')}}"
                            placeholder="" id="name">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@section('src')
<script src="{{url('backend')}}/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );
</script>
@stop
@stop