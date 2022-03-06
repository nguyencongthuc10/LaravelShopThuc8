@extends('admin/master')
@section('noidungadmin')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center" style="width:100%">
                        <form role="form" action="{{ URL('/products/' . $edit_product->id) }}" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="product"
                                        data-validation="length"  data-validation-length = "min2"
                                        data-validation-error-msg="Vui lòng không để trống hoặc không nhập nhỏ hơn 2 kí tự"
                                            name="update_name_product" value="{{ $edit_product->name_product }}">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="exampleInputEmail1">Tên Slug sản phẩm</label>
                                        <input type="text" class="form-control" id="slugProduct"
                                           name="update_slug_product"
                                            data-validation="length"  data-validation-length = "min2"
                                            data-validation-error-msg="Vui lòng không để trống hoặc không nhập nhỏ hơn 2 kí tự"
                                            value="{{ $edit_product->slug_product }}">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="exampleInputFile">Danh mục sản phẩm</label>
                                        <select name="brand_product" class="form-control input-sm m-bot15">
                                            @foreach ($brand as $key => $brand_id)
                                                @if ($brand_id->id == $edit_product->id_brand)
                                                    <option selected value="{{ $brand_id->id }}">
                                                        {{ $brand_id->name_brand }}
                                                    </option>
                                                @else
                                                    <option value="{{ $brand_id->id }}">{{ $brand_id->name_brand }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Phân loại Nam / Nữ</label>
                                        <select name="update_classify_product" class="form-control input-sm m-bot15">
                                            @if ($edit_product->classify_product === 0)
                                                <option value="0">Không</option>
                                                <option value="1">Nam</option>
                                                <option value="2">Nữ</option>
                                            @elseif ($edit_product->classify_product === 1)
                                                <option value="1">Nam</option>
                                                <option value="0">Không</option>
                                                <option value="2">Nữ</option>
                                            @else
                                                <option value="2">Nữ</option>
                                                <option value="0">Không</option>
                                                <option value="1">Nam</option>
                                            @endif

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                        <input type="file" class="form-control" name="update_img_product">
                                        <img src="{{ URL('public/updates/product/' . $edit_product->image_product) }}"
                                            height="100px" width="100px">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh 1 chi tiết sản phẩm</label>
                                        <input type="file" class="form-control" name="update_detail_1_img_product">
                                        <img src="{{ URL('public/updates/product/' . $edit_product->detail1_image_product) }}"
                                            height="100px" width="100px">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh 2 chi tiết sản phẩm</label>
                                        <input type="file" class="form-control" name="update_detail_2_img_product">
                                        <img src="{{ URL('public/updates/product/' . $edit_product->detail2_image_product) }}"
                                            height="100px" width="100px">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh 3 chi tiết sản phẩm</label>
                                        <input type="file" class="form-control" name="update_detail_3_img_product">
                                        <img src="{{ URL('public/updates/product/' . $edit_product->detail3_image_product) }}"
                                            height="100px" width="100px">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh 4 chi tiết sản phẩm</label>
                                        <input type="file" class="form-control" name="update_detail_4_img_product">
                                        <img src="{{ URL('public/updates/product/' . $edit_product->detail4_image_product) }}"
                                            height="100px" width="100px">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 ">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                                        <input type="text" class="form-control"
                                            data-validation-error-msg="Vui lòng nhập số và không nhỏ hơn 1"
                                            data-validation="length" data-validation-length="min3" name="update_price_product"
                                            placeholder="Nhập tên danh mục..."
                                            value="{{ $edit_product->price_product }}">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">% Khuyến mãi</label>
                                        <input type="number" class="form-control" maxlength="3" min="0" max="100"
                                            name="update_discount_price_product"
                                            value="{{ $edit_product->discount_price_product }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ẩn/Hiện</label>
                                        <select name="update_status_product" class="form-control input-sm m-bot15">
                                            @if ($edit_product->status_product === 1)
                                                <option value="1">Hiện</option>
                                                <option value="0">Ẩn</option>
                                            @else
                                                <option value="0">Ẩn</option>
                                                <option value="1">Hiện</option>
                                            @endif

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                        <textarea type="text" style="resize: none;" rows="8" class="form-control"
                                            name="update_desc_product"
                                            id="editor5">{{ $edit_product->desc_product }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nội dung thương hiệu</label>
                                        <textarea type="text" style="resize: none;" rows="8" class="form-control"
                                            name="update_desc_product"
                                            id="editor6">{{ $edit_product->content_product }}</textarea>
                                    </div>


                                </div>
                            </div>
                            <div class="form-group">


                                @if ($edit_product->highlight_product === 1)
                                    <label for="vehicle1"> Nổi bật</label><br>
                                    <input type="checkbox" name="update_highlight_product" value="1" checked>
                                @else
                                    <label for="vehicle1"> Nổi bật</label><br>
                                    <input type="checkbox" name="update_highlight_product" value="1">
                                @endif
                            </div>
                            <button type="submit" name="update_btn_product" class="btn btn-info">Cập nhật sãn
                                phẩm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>

    </div>

@endsection
