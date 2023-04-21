@extends('admin_home')
@section('admin_content')
<div style="margin-right: 100px; margin-left: 70px">
    <div class="panel panel-default">
        <div class="panel-heading text-center" style="font-size: 20px">
            <b>LIỆT KÊ ĐƠN HÀNG</b>
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
                        <th>Tổng tiền</th>
                        <th>Tình trạng</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_order as $key => $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->order_total}}</td>
                        <td>{{$order->order_status}}</td>
                        <td>
                            <a href="{{URL::to('/view_order/'.$order->order_id)}}" class="active" ui-toggle-class="" style="font-size: 18px">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>
                            <a href="{{URL::to('/delete_order/'.$order->order_id)}}" class="active" ui-toggle-class="" style="font-size: 20px" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?')">
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