@extends('admin_home')
@section('admin_content')
<div style="margin-right: 100px; margin-left: 70px">
    <div class="panel panel-default">
        <div class="panel-heading text-center" style="font-size: 20px">
            <b>LIỆT KÊ SẢN PHẨM</b>
        </div>
        <div class="row w3-res-tb" style="padding: 10px">
            <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
        </div>
        </div>
        <div class="table-responsive">
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="alert alert-success">'.$message.'</span>';
                    Session::put('message', null);
                }
            ?>
            <table class="table table-striped b-t b-light" style="margin-top: 10px">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Hình ảnh sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Hiển thị</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_product as $key => $pro)
                    <tr>
                        <td>{{$pro->product_name}}</td>
                        <td>{{$pro->product_price}}</td>
                        <td><img src="public/upload/product/{{$pro->product_image}}" alt="" height="100" width="100"></td>
                        <td>{{$pro->category_name}}</td>
                        <td>{{$pro->brand_name}}</td>
                        <td>
                            <span class="text-ellipsis">
                                @if($pro->product_status==0)
                                    <a href="{{URL::to('/status_product/'.$pro->product_id)}}"><span style="font-size: 25px" class="fa fa-eye-slash"></span></a>
                                @endif
                                @if($pro->product_status==1)
                                    <a href="{{URL::to('/unstatus_product/'.$pro->product_id)}}"><span style="font-size: 25px" class="fa fa-eye"></span></a>
                                @endif
                            </span>
                        </td>
                        <td>
                            <a href="{{URL::to('/edit_product/'.$pro->product_id)}}" class="active" ui-toggle-class="" style="font-size: 18px">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>
                            <a href="{{URL::to('/delete_product/'.$pro->product_id)}}" class="active" ui-toggle-class="" style="font-size: 20px" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">
                                <i class="fa fa-times text-danger text"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection