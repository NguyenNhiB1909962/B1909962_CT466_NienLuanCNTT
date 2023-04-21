@extends('admin_home')
@section('admin_content')
<div class="row container">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading text-center" style="font-size: 20px">
                <b>CẬP NHẬT THƯƠNG HIỆU SẢN PHẨM</b>
            </header>
            <div class="panel-body">
                @if(Session::get('message'))
                    <div class="alert alert-success" style="font-size: 18px">{{Session::get('message')}}</div>
                    {{Session::put('message', null)}}
                @endif
                @foreach ($edit_brand_product as $key => $edit_brand)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update_brand_product/'.$edit_brand->brand_id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu" name="brand_product_name" value="{{$edit_brand->brand_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" placeholder="Mô tả thương hiệu" name="brand_product_desc">{{$edit_brand->brand_desc}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-info" name="edit_brand_product">Cập nhật thương hiệu</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

</div>
@endsection