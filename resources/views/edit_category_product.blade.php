@extends('admin_home')
@section('admin_content')
<div class="row container">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading text-center" style="font-size: 20px">
                <b>CẬP NHẬT DANH MỤC SẢN PHẨM</b>
            </header>
            <div class="panel-body">
                @if(Session::get('message'))
                    <div class="alert alert-success" style="font-size: 18px">{{Session::get('message')}}</div>
                    {{Session::put('message', null)}}
                @endif
                @foreach ($edit_category_product as $key => $edit_cate)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update_category_product/'.$edit_cate->category_id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" name="category_product_name" value="{{$edit_cate->category_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục" name="category_product_desc">{{$edit_cate->category_desc}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-info" name="edit_category_product">Cập nhật danh mục</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

</div>
@endsection