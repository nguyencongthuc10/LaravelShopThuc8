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

                            <th>Tên thương hiệu</th>
                            <th>Hình ảnh thương hiệu</th>
                            <th>Trạng thái</th>                        
                            <th>Thao tác</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- vòng lặp Brand-->
                        @foreach ($all_paginate_brand as $key => $brand)
                            <tr>
                                <td style="width:25%;vertical-align:middle">{{ $brand->name_brand }}</td>

                                <td style="vertical-align:middle"><img src="public/updates/brand/{{ $brand->image_brand }}" height="80px" width="80px">
                                
                                
                                <td style="vertical-align:middle">
                                @if ($brand->status_brand == 1)
                                <a
                                href="{{ URL('/un-active-brand/' . $brand->id) }}"><i
                                    class="fa fa-eye eye-category" aria-hidden="true"></i></a>
                                @else
                                <a
                                href="{{ URL('/active-brand/' . $brand->id) }}"><i
                                    class="fa fa-eye-slash eye-category" aria-hidden="true"></i></i></a>
                                @endif</td>
                                <td style="vertical-align:middle">
                                    <div style="display: flex; align-items: center; text-align: center; ">
                                        <form action="{{ URL('/edit-brand/' . $brand->id) }}" method="">
                                            <button type="submit" class="btn btn-danger" style=" font-size:15px; margin-top:5px;">Sửa</button>
                                        </form>
                                        <span style="margin:0 5px 0 5px;"> OR</span>
                                        <form action="{{ URL('/delete-brand/' . $brand->id) }}" method="get" 
                                            onclick="return confirm('Bạn có muốn xóa thương hiệu này không ?')">
                                            
                                            
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
                        <small class="text-muted inline m-t-sm m-b-sm">Showing {{ $all_paginate_brand->firstItem() }} to
                            {{ $all_paginate_brand->lastItem() }}
                            of total {{ $all_paginate_brand->total() }} entries</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">

                        {{ $all_paginate_brand->links() }}
                    </div>
                </div>
            </footer>
        @endsection
