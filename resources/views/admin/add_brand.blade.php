@extends('admin/master')
@section('noidungadmin')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ URL('/save-brand') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" class="form-control" data-validation="length" id="brand"
                                data-validation="length"  data-validation-length = "min2"
                                data-validation-error-msg="Vui lòng không để trống hoặc không nhập nhỏ hơn 2 kí tự"
                                    name="add_name_brand" placeholder="Nhập tên danh mục...">
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">Tên Slug thương hiệu</label>
                                <input type="text" class="form-control" id="slugBrand" 
                                   name="add_slug_brand" data-validation="length"  data-validation-length = "min2"
                                   data-validation-error-msg="Vui lòng không để trống hoặc không nhập nhỏ hơn 2 kí tự"
                                   >
                            </div> --}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea type="text" style="resize: none;" rows="8" class="form-control"
                                    name="add_desc_brand" id="editor1" placeholder="Nhập mô tả thương hiệu"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh thương hiệu</label>
                                <input type="file" class="form-control" id="imgbrand" name="add_img_brand"
                                data-validation="required" data-validation-error-msg="Vui lòng chọn hình ảnh">
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ẩn/Hiện</label>
                                <select name="brand_product_status" class="form-control input-sm m-bot15">
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>

                                </select>

                            </div>

                            <button type="submit" name="add_btn_brand" class="btn btn-info">Thêm thương hiệu</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>

    </div>

@endsection

