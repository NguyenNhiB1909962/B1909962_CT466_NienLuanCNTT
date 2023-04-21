@extends('admin_home')
@section('admin_content')
<div style="margin-right: 100px; margin-left: 70px">
    <div class="panel panel-default">
        <div class="panel-heading text-center" style="font-size: 20px">
            <b>LIỆT KÊ DANH MỤC SẢN PHẨM</b>
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
                        <th>Tên danh mục</th>
                        <th>Hiển thị</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_category_product as $key => $category_pro)
                    <tr>
                        <td>{{$category_pro->category_name}}</td>
                        <td>
                            <span class="text-ellipsis">
                                @if($category_pro->category_status==0)
                                    <a href="{{URL::to('/status_category_product/'.$category_pro->category_id)}}"><span style="font-size: 25px" class="fa fa-eye-slash"></span></a>
                                @endif
                                @if($category_pro->category_status==1)
                                    <a href="{{URL::to('/unstatus_category_product/'.$category_pro->category_id)}}"><span style="font-size: 25px" class="fa fa-eye"></span></a>
                                @endif
                            </span>
                        </td>
                        <td>
                            <a href="{{URL::to('/edit_category_product/'.$category_pro->category_id)}}" class="active" ui-toggle-class="" style="font-size: 18px">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>
                            <a href="{{URL::to('/delete_category_product/'.$category_pro->category_id)}}" class="active" ui-toggle-class="" style="font-size: 20px" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')">
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