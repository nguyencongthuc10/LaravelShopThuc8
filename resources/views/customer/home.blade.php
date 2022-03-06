@extends('index')
@section('noidung')

    <div id="header__banner">
        <div class='parent'>
            <div class='slider'>
                <button type="button" id='right' class='right' name="button">

                    <svg version="1.1" id="Capa_1" width='40px' height='40px ' xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175"
                        style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
                        <g>
                            <path style='fill: #9d9d9d;' d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                  c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
                  " />
                        </g>

                    </svg>

                </button>
                <button type="button" id='left' class='left' name="button">
                    <svg version="1.1" id="Capa_2" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175"
                        style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
                        <g>
                            <path style='fill: #9d9d9d;' d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
              c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z" />
                        </g>
                    </svg>
                </button>
                <svg id='svg2' class='up2' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle id='circle1' class='circle1 steap' cx="34px" cy="50%" r="20" />
                    <circle id='circle2' class='circle2 steap' cx="34px" cy="50%" r="100" />
                    <circle id='circle3' class='circle3 steap' cx="34px" cy="50%" r="180" />
                    <circle id='circle4' class='circle4 steap' cx="34px" cy="50%" r="260" />
                    <circle id='circle5' class='circle5 steap' cx="34px" cy="50%" r="340" />
                    <circle id='circle6' class='circle6 steap' cx="34px" cy="50%" r="420" />
                    <circle id='circle7' class='circle7 steap' cx="34px" cy="50%" r="500" />
                    <circle id='circle8' class='circle8 steap' cx="34px" cy="50%" r="580" />
                    <circle id='circle9' class='circle9 steap' cx="34px" cy="50%" r="660" />
                    <circle id='circle10' class='circle10 steap' cx="34px" cy="50%" r="740" />
                    <circle id='circle11' class='circle11 steap' cx="34px" cy="50%" r="820" />
                    <circle id='circle12' class='circle12 steap' cx="34px" cy="50%" r="900" />
                    <circle id='circle13' class='circle13 steap' cx="34px" cy="50%" r="980" />
                    <circle id='circle14' class='circle14 steap' cx="34px" cy="50%" r="1060" />
                </svg>
                <svg id='svg1' class='up2' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle id='circle15' class='circle15 steap' cx="24.5%" cy="50%" r="20" />
                    <circle id='circle16' class='circle16 steap' cx="24.5%" cy="50%" r="100" />
                    <circle id='circle17' class='circle17 steap' cx="24.5%" cy="50%" r="180" />
                    <circle id='circle18' class='circle18 steap' cx="24.5%" cy="50%" r="260" />
                    <circle id='circle19' class='circle19 steap' cx="24.5%" cy="50%" r="340" />
                    <circle id='circle20' class='circle20 steap' cx="24.5%" cy="50%" r="420" />
                    <circle id='circle21' class='circle21 steap' cx="24.5%" cy="50%" r="500" />
                    <circle id='circle22' class='circle22 steap' cx="24.5%" cy="50%" r="580" />
                    <circle id='circle23' class='circle23 steap' cx="24.5%" cy="50%" r="660" />
                    <circle id='circle24' class='circle24 steap' cx="24.5%" cy="50%" r="740" />
                    <circle id='circle25' class='circle25 steap' cx="24.5%" cy="50%" r="820" />
                    <circle id='circle26' class='circle26 steap' cx="24.5%" cy="50%" r="900" />
                    <circle id='circle27' class='circle27 steap' cx="24.5%" cy="50%" r="980" />
                    <circle id='circle28' class='circle28 steap' cx="24.5%" cy="50%" r="1060" />
                </svg>
                <div id='slide1' class='slide1 up1'>ROLEX</div>
                <div id='slide2' class='slide2'>Audemars Piguet</div>
                <div id='slide3' class='slide3'>TAG Heuer</div>
                <div id='slide4' class='slide4'>Hublot</div>
            </div>
        </div>



    </div>
    </header>
    <!-- ==============================================================BANNER================================================================== -->
    <div class="banner1">
        <div class="container">
            <div class="banner-xuhuong">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="xuhuong-nam">
                            <a class="button-nam" href="{{URL('/watch-man.html')}}">

                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Xu hướng nam
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="xuhuong-nu">
                            <a class="button-nu" href="{{URL('/watch-man.html')}}">
                                Xu hướng nữ
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ======================================Product outstanding=========================== -->
            <div class="sanpham-noibat">
                <div class="swiper-container">
                    <div id='nz-div'>
                        <h3 class="tde">
                            <span class="null">Sản phẩm nổi bật</span>
                        </h3>
                    </div>
                    <div class="swiper-wrapper">
                        @foreach ($show_highlight as $key => $highlight_product)

                            <div class="swiper-slide">
                                <div class="sanpham-index">
                                    <div class="body-sanpham-index">

                                        <div class="img-pr">
                                            <img src="{{ URL('public/updates/product/' . $highlight_product->image_product) }}"
                                                alt="{{$highlight_product->image_product}}">
                                        </div>
                                        <div class="bao-pr">
                                            <div class="name-price-pr">
                                                @if ($highlight_product->discount_price_product > 0)
                                                    <div class="pt-discount">
                                                        <span>-{{ $highlight_product->discount_price_product }}%</span>
                                                    </div>
                                                @endif
                                                <span class="name_product">{{ $highlight_product->name_product }} -
                                                    @if ($highlight_product->classify_product === 0)
                                                        Nam và Nữ
                                                    @elseif($highlight_product->classify_product === 1)
                                                        Đồng hồ Nam
                                                    @else
                                                        Đồng hồ Nữ
                                                    @endif
                                                </span>

                                            </div>
                                            <div class="price-discount">

                                                @if ($highlight_product->discount_price_product > 0)
                                                    <span
                                                        style="color:red;font-weight:bold">{{ number_format($highlight_product->price_product - ($highlight_product->price_product / 100) * $highlight_product->discount_price_product) . ' ' . 'VND' }}</span>
                                                    <span
                                                        class="discount">{{ number_format($highlight_product->price_product) . ' ' . 'VND' }}</span>
                                                @else
                                                    <span>{{ number_format($highlight_product->price_product) . ' ' . 'VND' }}</span>
                                                @endif

                                            </div>

                                            <div class="btn-cart-detail">
                                                <a href="" class="addtocart" data-id="{{$highlight_product->id}}"><button class="pr-cart"> <i class="fal fa-shopping-cart"></i></button></a>
                                                <a href="{{URL('detail-product/' . $highlight_product->slug_product) . '.html' }}"><button class="pr-detail">Chi tiết <i class="far fa-angle-double-right"></i></button></a>
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach




                    </div>
                    <!-- Add Navigation -->
                    <div class="navigation">
                        <div class="swiper-button-prev swiper-button-white"></div>
                        <div class="swiper-button-next swiper-button-white"></div>

                    </div>
                </div>
            </div>
            <!-- ==========================END - sản phẩm nổi bật  -->




            <!-- ===============================Product new============================== -->
            <div class="sanpham-noibat">
                <div class="swiper-container">
                    <div id='nz-div'>
                        <h3 class="tde">
                            <span class="null">Sản phẩm mới nhất</span>
                        </h3>
                    </div>
                    <div class="swiper-wrapper">
                        @foreach ($show_new as $key => $new_product)

                            <div class="swiper-slide">
                                <div class="sanpham-index">
                                    <div class="body-sanpham-index">

                                        <div class="img-pr">
                                            <img src="{{ URL('public/updates/product/' . $new_product->image_product) }}"
                                                alt="{{$new_product->image_product}}">
                                        </div>
                                        <div class="bao-pr">
                                            <div class="name-price-pr">
                                                @if ($new_product->discount_price_product > 0)
                                                    <div class="pt-discount">
                                                        <span>-{{ $new_product->discount_price_product }}%</span>
                                                    </div>
                                                @else
                                                    <div class="pt-discount">
                                                        <span>NEW</span>
                                                    </div>
                                                @endif
                                                <span class="name_product">{{ $new_product->name_product }} -
                                                    @if ($new_product->classify_product === 0)
                                                        Nam và Nữ
                                                    @elseif($new_product->classify_product === 1)
                                                        Đồng hồ Nam
                                                    @else
                                                        Đồng hồ Nữ
                                                    @endif
                                                </span>
                                                <span class="star">

                                                </span>
                                            </div>
                                            <div class="price-discount">

                                                @if ($new_product->discount_price_product > 0)
                                                    <span
                                                        style="color:red;font-weight:bold">{{ number_format($new_product->price_product - ($new_product->price_product / 100) * $new_product->discount_price_product) . ' ' . 'VND' }}</span>
                                                    <span
                                                        class="discount">{{ number_format($new_product->price_product) . ' ' . 'VND' }}</span>
                                                @else
                                                    <span>{{ number_format($new_product->price_product) . ' ' . 'VND' }}</span>
                                                @endif

                                            </div>

                                            <div class="btn-cart-detail">
                                               <a href="" class="addtocart" data-id="{{$new_product->id}}"><button class="pr-cart"> <i class="fal fa-shopping-cart"></i></button></a>
                                                <a href="{{URL('detail-product/' . $new_product->slug_product) . '.html' }}"><button class="pr-detail">Chi tiết <i class="far fa-angle-double-right"></i></button></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- Add Navigation -->
                    <div class="navigation">
                        <div class="swiper-button-prev swiper-button-white"></div>
                        <div class="swiper-button-next swiper-button-white"></div>

                    </div>
                </div>
            </div>
            <!-- ===================================END Product new=============================================== -->




            <!-- =============================Product-discount================= -->
            <div class="sanpham-noibat">
                <div class="swiper-container">
                    <div id='nz-div'>
                        <h3 class="tde">
                            <span class="null">Sản phẩm giảm giá</span>
                        </h3>
                    </div>
                    <div class="swiper-wrapper">
                        @foreach ($show_discount as $key => $discount_product)

                            <div class="swiper-slide">
                                <div class="sanpham-index">
                                    <div class="body-sanpham-index">

                                        <div class="img-pr">
                                            <img src="{{ URL('public/updates/product/' . $discount_product->image_product) }}"
                                                alt="{{$discount_product->image_product}}">
                                        </div>
                                        <div class="bao-pr">
                                            <div class="name-price-pr">

                                                <div class="pt-discount">
                                                    <span>-{{ $discount_product->discount_price_product }}%</span>
                                                </div>

                                                <span class="name_product">{{ $discount_product->name_product }} -
                                                    @if ($discount_product->classify_product === 0)
                                                        Nam và Nữ
                                                    @elseif($discount_product->classify_product === 1)
                                                        Đồng hồ Nam
                                                    @else
                                                        Đồng hồ Nữ
                                                    @endif
                                                </span>

                                            </div>
                                            <div class="price-discount">
                                                <span
                                                    style="color:red;font-weight:bold">{{ number_format($discount_product->price_product - ($discount_product->price_product / 100) * $discount_product->discount_price_product) . ' ' . 'VND' }}</span>
                                                <span
                                                    class="discount">{{ number_format($discount_product->price_product) . ' ' . 'VND' }}</span>


                                            </div>
                                            <div class="btn-cart-detail">
                                                <a href="" class="addtocart" data-id="{{$discount_product->id}}"><button class="pr-cart"> <i class="fal fa-shopping-cart"></i></button></a>
                                                <a href="{{URL('detail-product/' . $discount_product->slug_product) . '.html' }}"><button class="pr-detail">Chi tiết <i class="far fa-angle-double-right"></i></button></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Navigation -->
                    <div class="navigation">
                        <div class="swiper-button-prev swiper-button-white"></div>
                        <div class="swiper-button-next swiper-button-white"></div>
                    </div>
                </div>
            </div>
            <!-- =============================END Product-discount================= -->
            <!-- =============================ALL - PRODUCT================= -->
            <div class="donghonam" style="margin-top:15px;">   
                
                    <div id='nz-div'>
                        <h3 class="tde">
                            <span class="null">Tất cả sản phẩm</span>
                        </h3>
                    </div>
                    <div class="sanpham">
                        
                        <div class="row-sp" id="product_home">
                            
                           
                        </div>
                        
                    </div>
                
            </div>
            <!-- ============================= END ALL - PRODUCT================= -->
        </div>
    </div>
    <!-- ==================================================================END-BANNER======================================================= -->




@endsection
