@extends('admin_home')
@section('admin_content')
<div class="row container">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading text-center" style="font-size: 20px">
                <b>THÊM DANH MỤC SẢN PHẨM</b>
            </header>
            <div class="panel-body">
                @if(Session::get('message'))
                    <div class="alert alert-success" style="font-size: 18px">{{Session::get('message')}}</div>
                    {{Session::put('message', null)}}
                @endif
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save_category_product')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" name="category_product_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục" name="category_product_desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="category_product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_category_product">Thêm danh mục</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection