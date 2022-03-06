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

                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th> 
                            <th>Ghi chú</th>                        
                            <th>Thao tác</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- vòng lặp Brand-->
                        @foreach ($info_customer as $key => $info)
                            <tr>
                                <td style="width:25%;vertical-align:middle">{{ $info->info_name }}</td>

                                
                                
                                
                                <td style="vertical-align:middle">
                                    {{$info->info_address }}
                                </td>
                                <td style="vertical-align:middle">
                                    {{$info->info_phone }}
                                </td>
                                <td style="vertical-align:middle">
                                    {{$info->info_note }}
                                </td>
                                <td style="vertical-align:middle">
                                    <div style="display: flex; align-items: center; text-align: center; ">
                                        <form action="{{ URL('/info-detail/' . $info->info_customer_id) }}" method="">
                                            <button type="submit" class="btn btn-danger" style=" font-size:15px; margin-top:5px;">Chi tiết đơn hàng</button>
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
                        <small class="text-muted inline m-t-sm m-b-sm">Showing {{ $info_customer->firstItem() }} to
                            {{ $info_customer->lastItem() }}
                            of total {{ $info_customer->total() }} entries</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">

                        {{ $info_customer->links() }}
                    </div>
                </div>
            </footer>
@endsection
