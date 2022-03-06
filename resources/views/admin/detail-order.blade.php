@extends('admin/master')
@section('noidungadmin')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách thương hiệu
                <br>
            </div>
            
            <?php
            $messge_brand = Session::get('messge_brand');
            if ($messge_brand) {
                echo '<span class="alert-text" style=" float: right; text-transform: uppercase; color:green !important">' . $messge_brand . '</span>';
                Session::put('messge_brand', null);
            }
            ?>

            
            <?php
            $messge_cnbrand = Session::get('messge_cnbrand');
            if ($messge_cnbrand) {
                echo '<span class="alert-text" style=" float: right; text-transform: uppercase; color:green !important">' . $messge_cnbrand . '</span>';
                Session::put('messge_cnbrand', null);
            }
            ?>

            <?php
            $messge_xoabrand = Session::get('messge_xoabrand');
            
            if ($messge_xoabrand) {
                echo '<span class="alert-text" style=" float: right; text-transform: uppercase; color:red!important">' . $messge_xoabrand . '</span>';
                Session::put('messge_xoabrand', null);
            }
            ?>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Nhập danh mục cần tìm...">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>

                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Tổng</th>
                            <th>Trạng thái</th>                        
                            <th>Thao tác</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- vòng lặp Brand-->
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($detail_order as $key => $order)
                               @php
                                    $subtotal = $order->order_qty * $order->order_price;
                               @endphp
                            <tr>
                                <td style="width:25%;vertical-align:middle">{{ $order->order_name }} x {{$order->order_qty}}</td>

                                <td style="vertical-align:middle"><img src="{{ URL('public/updates/product/' . $order->order_image) }}" height="80px"
                                    width="80px">
                                <td style="vertical-align:middle">
                                    {{$order->order_price}}
                                </td>
                                <td style="vertical-align:middle">
                                   {{ $subtotal}}
                                </td>
                                <td style="vertical-align:middle">
                                    <form action="{{URL('/order-status/'.$order->id)}}" method="get">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        @if ($order->order_status == 0)
                                        <select class="input-sm form-control w-sm inline v-middle" name="orderStatus">
                                            <option value="0">Đang xử lý</option>
                                            <option value="1">Xác nhận đơn hàng</option>
                                            <option value="2">Hủy đơn hàng</option>
                                            <option value="3">Đã giao thành công</option>
                                        </select>
                                        @elseif ($order->order_status == 1)  
                                        <select class="input-sm form-control w-sm inline v-middle" name="orderStatus">
                                            <option value="1">Xác nhận đơn hàng</option>
                                            <option value="0">Đang xử lý</option>
                                            <option value="2">Hủy đơn hàng</option>
                                            <option value="3">Đã giao thành công</option>
                                        </select>
                                        @elseif ($order->order_status == 2)  
                                        <select class="input-sm form-control w-sm inline v-middle" name="orderStatus">
                                            <option value="2">Hủy đơn hàng</option>
                                            <option value="0">Đang xử lý</option>
                                            <option value="1">Xác nhận đơn hàng</option>
                                            <option value="3">Đã giao thành công</option>
                                        </select>
                                        @else
                                        <select class="input-sm form-control w-sm inline v-middle" name="orderStatus">
                                            <option value="3">Đã giao thành công</option>
                                            <option value="0">Đang xử lý</option>
                                            <option value="1">Xác nhận đơn hàng</option>
                                            <option value="2">Hủy đơn hàng</option>
                                        </select>
                                        @endif
                                        <button class="btn btn-sm btn-default">Thực hiện</button>
                                        </form>
                                </td>
                                <td style="vertical-align:middle">
                                    <div style="display: flex; align-items: center; text-align: center; ">
                                        <form action="{{ URL('/delete-order/' . $order->id) }}" method="get" 
                                            onclick="return confirm('Bạn có muốn xóa không ?')">
                                            
                                            
                                            <button type="submit" class="btn btn-danger" style=" font-size:15px; margin-top:5px;">Delete</button>
                                        </form>
                                    </div>
                                   
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">Showing {{ $detail_order->firstItem() }} to
                            {{ $detail_order->lastItem() }}
                            of total {{ $detail_order->total() }} entries</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">

                        {{ $detail_order->links() }}
                    </div>
                </div>
            </footer>
        @endsection
