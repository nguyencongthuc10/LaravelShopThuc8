@extends('admin/master')
@section('noidungadmin')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách thương hiệu
                <br>
            </div>
            <?php
            $messge_sp = Session::get('messge_sp');
            if ($messge_sp) {
                echo '<span class="alert-text" style=" float: right; text-transform: uppercase; color:green !important">' . $messge_sp . '</span>';
                Session::put('messge_sp', null);
            }
            ?>


            <?php
            $messge_cnsp = Session::get('messge_cnsp');
            if ($messge_cnsp) {
                echo '<span class="alert-text" style=" float: right; text-transform: uppercase; color:green !important">' . $messge_cnsp . '</span>';
                Session::put('messge_cnsp', null);
            }
            ?>

            <?php
            $messge_xoasp = Session::get('messge_xoasp');
            
            if ($messge_xoasp) {
                echo '<span class="alert-text" style=" float: right; text-transform: uppercase; color:red!important">' . $messge_xoasp . '</span>';
                Session::put('messge_xoasp', null);
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
                            <th>Phân loại Nam / Nữ</th>
                            <th>Trạng thái</th>
                            <th>Nổi bật</th>
                            <th>Thao tác</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- vòng lặp product-->
                        @foreach ($product_paginate as $key => $product)
                            <tr>
                                <td style="width:25%; max-width:25%;vertical-align:middle">{{ $product->name_product }}
                                    <li> $ {{ $product->price_product }} (đ)
                                    </li>
                                    <li>
                                        $ {{ $product->highlight_product }} (%)
                                    </li>
                                </td>

                                <td style="vertical-align:middle">
                                    <img src="public/updates/product/{{ $product->image_product }}" height="80px"
                                        width="80px">
                                </td>
                                <td style="vertical-align:middle">
                                    @if ($product->classify_product === 0)
                                    Không
                                    @elseif ($product->classify_product === 1)
                                    Nam
                                    @else
                                    Nữ    
                                    @endif
                                </td>
                                <td style="vertical-align:middle">
                                    @if ($product->status_product == 1)
                                        <a href="{{ URL('/un-active-product/' . $product->id) }}"><i
                                                class="fa fa-eye eye-category" aria-hidden="true"></i></a>
                                    @else
                                        <a href="{{ URL('/active-product/' . $product->id) }}"><i
                                                class="fa fa-eye-slash eye-category" aria-hidden="true"></i></i></a>
                                    @endif
                                </td>

                                <td style="vertical-align:middle">
                                    @if ($product->highlight_product == 1)
                                        <a href="{{URL ('/un-active-highlight/'. $product->id)}}">
                                            <span style="text-decoration: none;border: 1px solid;background: #e84118;padding: 3px;
                                                color: #ebdada;border-radius: 7px;">
                                                Nổi bật
                                            </span>
                                        </a>
                                    @else
                                        <a href="{{URL('active-highlight/'. $product->id)}}" style="text-decoration: none;border: 1px solid;background: #00a8ff;padding: 3px;
                                                color: #f9f9f9;border-radius: 7px;">Không</a>
                                    @endif
                                </td>
                                <td style="vertical-align:middle">

                                    <div style="display: flex; align-items: center; text-align: center; ">
                                        <form action="{{ URL('/products/' . $product->id . '/edit') }}" method="get">
                                            <button type="submit" class="btn btn-danger"
                                                style=" font-size:15px; ">Sửa</button>
                                        </form>
                                        <span style="margin:0 5px 0 5px;"> OR</span>
                                        <form action="{{ URL('/products/' . $product->id) }}" method="post"
                                            onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')">
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <button type="submit" class="btn btn-danger"
                                                style=" font-size:15px; ">Delete</button>
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
                        <small class="text-muted inline m-t-sm m-b-sm">Showing {{ $product_paginate->firstItem() }} to
                            {{ $product_paginate->lastItem() }}
                            of total {{ $product_paginate->total() }} entries</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">

                        {{ $product_paginate->links() }}
                    </div>
                </div>
            </footer>
        @endsection
