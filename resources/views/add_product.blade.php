@extends('admin_home')
@section('admin_content')
<div class="row container">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading text-center" style="font-size: 20px">
                <b>THÊM SẢN PHẨM</b>
            </header>
            <div class="panel-body">
                @if(Session::get('message'))
                    <div class="alert alert-success" style="font-size: 18px">{{Session::get('message')}}</div>
                    {{Session::put('message', null)}}
                @endif
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm" name="product_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm" name="product_price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="product_image">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" placeholder="Mô tả sản phẩm" name="product_desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach ($cate_pro as $key => $cate)
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach ($brand_pro as $key => $brand)
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_product">Thêm sản phẩm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection