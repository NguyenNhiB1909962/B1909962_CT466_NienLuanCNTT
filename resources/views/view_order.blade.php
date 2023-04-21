@extends('admin_home')
@section('admin_content')
<div style="margin-right: 100px; margin-left: 70px">
    <div class="panel panel-default">
        <div class="panel-heading text-center" style="font-size: 20px">
            <b>THÔNG TIN NGƯỜI MUA</b>
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
                        <th>Tên người đặt hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>                        
                        <td>{{$order_by_id->name}}</td>
                        <td>{{$order_by_id->shopping_cart_address}}</td>
                        <td>{{$order_by_id->shopping_cart_phone}}</td>                        
                    </tr>                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<div style="margin-right: 100px; margin-left: 70px">
    <div class="panel panel-default">
        <div class="panel-heading text-center" style="font-size: 20px">
            <b>CHI TIẾT ĐƠN HÀNG</b>
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
                        <th>Hình ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_de_by_id as $key => $order)
                    <tr>
                        <td><img src="{{asset('public/upload/product/')}}/{{$order->product_image}}" alt="" height="100" width="100"></td>
                        <td>{{$order->product_name}}</td>
                        <td>{{$order->product_quantity}}</td>
                        <td>{{$order->product_price}}</td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @foreach ($order_by_total as $key => $order_by_total)
            <div style="float: right"><b>Tổng tiền: </b><span>{{$order_by_total->order_total}}</span></div>
            @endforeach
        </div>        
    </div>
</div>
@endsection