@extends('admin/master')
@section('noidungadmin')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center" style="width:100%">
                        <form role="form" action="{{ URL('/products') }}" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="product" name="add_name_product"
                                            data-validation="length"  data-validation-length = "min2"
                                            data-validation-error-msg="Vui lòng không để trống hoặc không nhập nhỏ hơn 2 kí tự"
                                            placeholder="Nhập tên sản phẩm...">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="exampleInputEmail1">Tên slug sản phẩm</label>
                                        <input type="text" class="form-control" id="slugProduct" name="add_slug_product"
                                            data-validation="length" data-validation-length="min2"
                                            data-validation-error-msg="Vui lòng không để trống hoặc không nhập nhỏ hơn 2 kí tự">
                                        </div> --}}
                                        <div class="  form-group">
                                        <label for="exampleInputFile">Danh mục sản phẩm</label>
                                        <select name="brand_product" class="form-control input-sm m-bot15">
                                            @foreach ($brand as $key => $brand_id)
                                                <option value="{{ $brand_id->id }}">{{ $brand_id->name_brand }}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Phân loại Nam / Nữ</label>
                                        <select name="product_classify" class="form-control input-sm m-bot15">
                                            <option value="0">Không</option>
                                            <option value="1">Nam</option>
                                            <option value="2">Nữ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                                        <input type="text" class="form-control"
                                            data-validation-error-msg="Vui lòng không để trống, vui lòng nhập số và không nhỏ hơn 1"
                                            data-validation="length" data-validation-length="min3" name="add_price_product"
                                            placeholder="Nhập giá sản phẩm...">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">% Khuyến mãi</label>
                                        <input type="number" class="form-control" value="0" maxlength="3" min="0" max="100"
                                            
                                            name="add_discount_price_product">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                        <textarea type="text" style="resize: none;" rows="8"
                                            class="form-control" name="add_desc_product"
                                            id="editor4" placeholder="Nhập mô tả sản phẩm..."></textarea>

                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                        <input type="file" class="form-control" name="add_img_product" 
                                        data-validation="required" data-validation-error-msg="Vui lòng chọn hình ảnh">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh 1 chi tiết sản phẩm</label>
                                        <input type="file" class="form-control" name="add_detail_1_img_product"
                                        data-validation="required" data-validation-error-msg="Vui lòng chọn hình ảnh">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh 2 chi tiết sản phẩm</label>
                                        <input type="file" class="form-control" name="add_detail_2_img_product"
                                        data-validation="required" data-validation-error-msg="Vui lòng chọn hình ảnh">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh 3 chi tiết sản phẩm</label>
                                        <input type="file" class="form-control" name="add_detail_3_img_product"
                                        data-validation="required" data-validation-error-msg="Vui lòng chọn hình ảnh">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh 4 chi tiết sản phẩm</label>
                                        <input type="file" class="form-control" name="add_detail_4_img_product"
                                        data-validation="required" data-validation-error-msg="Vui lòng chọn hình ảnh">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ẩn/Hiện</label>
                                        <select name="product_status" class="form-control input-sm m-bot15"
                                        >
                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                        <textarea type="text" style="resize: none;" rows="2"
                                            data-validation-error-msg="Ký tự không nhỏ hơn 2" class="form-control"
                                            data-validation="length" data-validation-length="min2"
                                            name="add_content_product" id="editor3"
                                            placeholder="Nhập nội dung sản phẩm..."></textarea>

                                    </div>
                                    
                                    
                                </div>


                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="add_highlight_product" value="1">
                                <label for="vehicle1"> Nổi bật</label><br>
                            </div>
                            <button type="submit" name="add_btn_category" class="btn btn-info">Thêm sản phẩm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>

    </div>

@endsection
