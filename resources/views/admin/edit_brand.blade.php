@extends('admin/master')
@section('noidungadmin')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu sản phẩm
                </header>
                <div class="panel-body">

                    <div class="position-center">
                        <form role="form" action="{{ URL('/update-brand/' . $info_edit->id) }}" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" class="form-control" data-validation="length" id="brand"
                                    data-validation-length="min2" data-validation-error-msg="Ký tự không nhỏ hơn 2"
                                    name="update_name_brand" value="{{ $info_edit->name_brand }}">
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">Tên Slug thương hiệu</label>
                                <input type="text" class="form-control" data-validation="length" id="slugBrand"
                                    data-validation-length="min2" name="update_slug_brand"
                                    data-validation-error-msg="Ký tự không nhỏ hơn 2"
                                    value="{{ $info_edit->slug_brand }}">
                            </div> --}}

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea type="text" style="resize: none;" rows="8" class="form-control"
                                    name="update_desc_brand" id="editor2">{{ $info_edit->desc_brand }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh thương hiệu</label>
                                <input type="file" class="form-control" name="update_img_brand">
                                <img src="{{ URL('public/updates/brand/' . $info_edit->image_brand) }}" height="100px"
                                    width="100px">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ẩn/Hiện</label>
                                <select name="update_status_brand" class="form-control input-sm m-bot15">
                                    @if ($info_edit->status_brand === 1)
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    @else
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    @endif

                                </select>

                            </div>

                            <button type="submit" name="update_btn_brand" class="btn btn-info">Cập nhật thương
                                hiệu</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>

    </div>

@endsection
