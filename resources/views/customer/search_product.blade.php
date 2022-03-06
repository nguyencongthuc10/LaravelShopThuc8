@extends('index')
@section('noidung')
    <div class="donghonam">

        <div class="container">

            <div id='nz-div'>
                <h3 class="tde">
                    <span class="null">Tìm kiếm</span>
                </h3>
            </div>
            <div class="sanpham">
                <div class="row-sp">
                    @if ($resultSearchProduct == null)
                    <div style="display: flex;height: 154px; align-items: center;">
                        <h3>Không có sản phẩm nào !</h3>
                    </div>
                    @elseif ($resultSearchProduct->isEmpty()) 
                    <div style="display: flex;height: 154px; align-items: center;">
                        <h3>Không có sản phẩm nào !</h3>
                    </div>
                    @else
                        @foreach ($resultSearchProduct as $key => $searchProduct)
                            <div class="col-sp-3">
                                <div class="body-sanpham">
                                    <form action="#" method="POST">
                                        <div class="img-pr">
                                            <img src="{{ URL('public/updates/product/' . $searchProduct->image_product) }}"
                                                alt="{{$searchProduct->image_product}}">
                                        </div>
                                        <div class="bao-pr">
                                            <div class="name-price-pr">
                                                @if ($searchProduct->discount_price_product > 0)
                                                    <div class="pt-discount">
                                                        <span>-{{ $searchProduct->discount_price_product }}%</span>
                                                    </div>
                                                @endif
                                                <span class="name_product">{{ $searchProduct->name_product }} -
                                                    @if ($searchProduct->classify_product === 0)
                                                        Nam và Nữ
                                                    @elseif($searchProduct->classify_product === 1)
                                                        Đồng hồ Nam
                                                    @else
                                                        Đồng hồ Nữ
                                                    @endif
                                                </span>
                                                
                                            </div>
                                            <div class="price-discount">
                                                @if ($searchProduct->discount_price_product > 0)
                                                    <span
                                                        style="color:red;font-weight:bold">{{ number_format($searchProduct->price_product - ($searchProduct->price_product / 100) * $searchProduct->discount_price_product) . ' ' . 'VND' }}</span>
                                                    <span
                                                        class="discount">{{ number_format($searchProduct->price_product) . ' ' . 'VND' }}</span>
                                                @else
                                                    <span>{{ number_format($searchProduct->price_product) . ' ' . 'VND' }}</span>
                                                @endif
                                            </div>
        
                                            <div class="btn-cart-detail">
                                                <a href="" class="addtocart" data-id="{{$searchProduct->id}}"><button class="pr-cart"> <i class="fal fa-shopping-cart"></i></button></a>
                                                <a href="{{URL('detail-product/' . $searchProduct->slug_product) . '.html' }}"><button class="pr-detail" href="{{URL('detail-product/' . $searchProduct->slug_product) . '.html' }}" type="button">Chi tiết <i class="far fa-angle-double-right"></i></button></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        
                      
                        @endforeach
                    
                    @endif
                    
                    
                </div>
            </div>

                      
           
            
        </div>
@endsection

