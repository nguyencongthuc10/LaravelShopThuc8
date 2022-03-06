    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <title>Shop Thuc</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/css/bootstrap.min.css') }}">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="{{ asset('public/fontend/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/css/swiper.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/css/magnify.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="{{ asset('public/fontend/css/xzoom.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/fontend/css/sweetalert.css') }}">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,400;1,200;1,400&display=swap"
            rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset('public/fontend/css/28.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="shopthuc">
            <header>
                <div class="header-top">
                    <span class="map"><i class="fal fa-map-marker-alt"></i> Số 15, Đường 18, P.Lnh Đông TP.Thủ
                        Đức</span>
                    <span class="phone"><i class="far fa-phone-alt"></i><a href="tel:034 998 3657">034 998
                            3657</a></span>
                </div>
                <div class="header-banner">
                    <nav>
                        <div class="logo">thucshop</div>
                        <div class="cart">
                            <span class="cart-span">
                                @php
                                    $total = 0;
                                    $dem = 0;
                                    
                                @endphp
                                <a href="{{ URL('show-cart-ajax.html') }}" id="clickcart"> <i
                                        class="fal fa-shopping-cart "></i></a>
                                <div id="dropdowncart">
                                    <div class="dropdown-cart" name="dropdown-cart">
                                        @if (Auth::check())
                                            @if (!Session::get(Auth::user()->cart_token) == '')
                                                <div class="group-product-cart">
                                                    @foreach (Session::get(Auth::user()->cart_token) as $key => $val1)
                                                        @php
                                                            $subtoal = $val1['product_price'] * $val1['product_qty'];
                                                            $total += $subtoal;
                                                            $dem++;
                                                        @endphp
                                                        <div class="product-cart">
                                                            <img
                                                                src="{{ URL('public/updates/product/' . $val1['product_image']) }}">
                                                            <div class="item-cart">
                                                                <div class="div-name-pr-cart"><span
                                                                        class="name-pr-cart">{{ $val1['product_name'] }}</span>
                                                                </div>
                                                                <div class="div-pricr-pr-cart"><span
                                                                        class="pricr-pr-cart">{{ $val1['product_price'] }}
                                                                        x {{ $val1['product_qty'] }}</span></div>
                                                            </div>
                                                        </div>

                                                    @endforeach
                                                </div>
                                                <div class="price-cart"><span>Tổng :</span>{{ $total }}
                                                </div>
                                                <div class=btn-full>
                                                    <a href="{{ URL('/show-cart-ajax.html') }}"><button
                                                            class="btn-cart">Xem giỏi hàng</button></a>

                                                    <a href="{{ URL('/thanh-toan.html') }}"><button
                                                            class="btn-pay">Thanh toán</button></a>
                                                </div>
                                            @else
                                                <h3 style="text-align: center; color: #000; font-size:15px;">Chưa có sản
                                                    phẩm nào trong giỏ hàng</h3>
                                            @endif
                                        @else
                                            <h3 style="text-align: center; color: #000; font-size:15px;">Chưa có sản
                                                phẩm nào trong giỏ hàng</h3>
                                        @endif

                                    </div>
                                    <span class="cout-cart">{{ $dem }}</span>
                                </div>


                            </span>

                        </div>
                        <span id="bars">
                            <i class="fas fa-bars"></i>
                        </span>
                        <span id="close">
                            <i class="fas fa-close"></i>
                        </span>
                        <div class="menu">
                            <ul>
                                <li>
                                    <div class="search">
                                        <form action="{{ url('/searchProduct.html') }}" method="get"
                                            id="FormsearchAjaxProduct">

                                            <label for="search"></label>
                                            <input class="input" id="searchAjaxProduct" name="keyword"
                                                type="search" class="form-control" placeholder="Nhập tìm kiếm">
                                            <button class="fas fa-search"></button>
                                        </form>
                                        <div id="searchAjax">

                                        </div>
                                    </div>




                                </li>
                                <div id="menu-1" class="menu-1">
                                    <li><a href="{{ URL('/home.html') }}" style="color: #d54242;"><i
                                                style="margin-right: 5px;" class="fas fa-home"></i>Trang chủ</a></li>
                                    <li><a href="{{ URL('/introduce.html') }}">Giới thiệu</a></li>
                                    <li><a href="{{ URL('/watch-man.html') }}">Đồng hồ nam</a></li>
                                    <li><a href="{{ URL('/watch-man.html') }}">Đồng hồ nữ</a></li>
                                    <li><a href="{{ URL('/contact.html') }}">Liên hệ</a></li>


                                    @if (Auth::check())
                                        <li class="dropdown loginindex">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                <img alt=""
                                                    src="http://localhost:8080/LaravelShopThuc/public/backend/images/2.png">
                                                <span class="username">{{ Auth::user()->name_user }}</span>
                                                <b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu extended logout">
                                                <li><a href="{{ URL('information-order.html') }}"
                                                        class="mauchulogin"><i class=" fa fa-suitcase"></i>Thông tin
                                                        đơn hàng</a></li>
                                                <li><a href="{{ URL('/changePass/doi-mat-khau.html') }}"
                                                        class="mauchulogin"><i class="fa fa-cog"></i>Đổi mật
                                                        khẩu</a></li>
                                                <li><a href="{{ URL('/logout.html') }}" class="mauchulogin"><i
                                                            class="fa fa-key"></i> Đăng xuất</a></li>
                                            </ul>
                                        </li>

                                    @else
                                        <li class="login"><a href="{{ URL('/login.html') }}">
                                                <i class="fad fa-user"></i>Đăng nhập</a></li>

                                    @endif


                                </div>

                            </ul>
                        </div>
                    </nav>
                </div>

            </header>



            @yield('noidung')



            <footer id="footer">
                <div class="container">
                    <div class="footer">
                        <div class="row">
                            <div class="col-md-3">
                                <h1>THUCSHOP</h1>
                                <div class="footer-left1">
                                    <p><i class="fal fa-map-marker-alt" style="margin-right: 5px;"></i>Số 15, Đường 18,
                                        P.Lnh Đông TP.Thủ Đức</p>
                                    <p><i class="far fa-phone-alt" style="margin-right: 5px;"></i><a
                                            href="tel:034 998 3657">034 998 3657</a></p>
                                    <p><i class="far fa-envelope" style="margin-right: 5px;"></i><a
                                            href="mailto:nguyencongthuc10g@gmail.com">nguyencongthuc10g@gmail.com
                                        </a></p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 col-sm-6">
                                <h2>Liên kết</h2>
                                <div class="footer-left2">
                                    <p><a href="{{ URL('/home.html') }}" style="color: #d54242;"></i>Trang chủ</a>
                                    </p>
                                    <p><a href="{{ URL('/introduce.html') }}">Giới thiệu</a></p>
                                    <p><a href="{{ URL('/watch-man.html') }}">Đồng hồ nam</a></p>
                                    <p><a href="{{ URL('/watch-woman.html') }}">Đông hồ nữ</a></p>
                                    <p><a href="{{ URL('/contact.html') }}">Liên hệ</a></p>


                                </div>
                            </div>
                            <div class="col-md-3 col-6 col-sm-6">
                                <h2>Hổ trợ</h2>
                                <div class="footer-right1">
                                    <p><a href="#">Hướng dẫn mua hàng</a></p>
                                    <p><a href="#">Hướng dẫn thanh toán</a></p>
                                    <p><a href="#">Chính sách bảo hành</a></p>
                                    <p><a href="#">Chính sach đổi trả</a></p>
                                    <p><a href="#">Tư vấn khách hàng</a></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h2>Đăng ký</h2>
                                <p>Đăng ký để nhận thông tin mới nhất từ chúng tôi.</p>
                                <div class="footer-right2">
                                    <div class="send-email">
                                        <form action="#">
                                            <label for="search"></label>
                                            <input class="input " type="search" placeholder="Nhập tìm kiếm">
                                            <button class="fal fa-paper-plane"></button>
                                        </form>
                                    </div>
                                    <div class="footer-icon">
                                        <span data-toggle="tooltip" data-html="true" data-placement="bottom"
                                            title="<h6>Facebook</h6>"><i class="fab fa-facebook"></i></span>
                                        <span data-toggle="tooltip" data-html="true" data-placement="bottom"
                                            title="<h6>Instagram</h6>"><i class="fab fa-instagram"></i></span>
                                        <span data-toggle="tooltip" data-html="true" data-placement="bottom"
                                            title="<h6>Twitter</h6>"><i class="fab fa-twitter"></i></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </footer>
            <div class="footer-license" id="footerlicense">
                <p>&copy Bản quyền thuộc về <a href="#">THUCSHOP</a></p>
            </div>
        </div>

        <div class="tt-backto-top">

            <div id="button"></div>
        </div>


        <script src="{{ asset('public/fontend/js/jquery.js') }}"></script>
        <script src="{{ asset('public/fontend/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('public/fontend/js/bootstrap.min.js') }}"></script>

        <script src="{{ asset('public/fontend/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('public/fontend/js/swiper.js') }}"></script>
        <script src="{{ asset('public/fontend/js/jquery.magnify.js') }}"></script>
        <script src="{{ asset('public/fontend/js/validatortuiche.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/fontend/js/xzoom.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.1/umd/react.production.min.js">
        </script>
        <script src="{{ asset('public/fontend/js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('public/fontend/js/sweetalert.js') }}"></script>
        {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.1/umd/react-dom.production.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/classnames/2.2.6/index.min.js"></script>
        <script src="{{ asset('public/fontend/js/script1.js') }}"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // No double click
            function isDoubleClicked(element) {
                //if already clicked return TRUE to indicate this click is not allowed
                if (element.data("isclicked")) return true;

                //mark as clicked for 1 second
                element.data("isclicked", true);
                setTimeout(function() {
                    element.removeData("isclicked");
                }, 1000);

                //return FALSE to indicate this click was allowed
                return false;
            }
        </script>
        @yield('javascript')
        <script type="text/javascript">
            (function() {
                var id = '';
                if ($('#product_home')) {

                    load_more(id);

                    function load_more($id = '') {
                        $.ajax({
                            method: 'POST',
                            url: '{{ url('/load-more-product') }}',
                            data: {

                                id: $id,
                            },
                            success: function(data) {
                                if (data == '') {

                                    $('#load_more_product').remove();

                                    return;
                                } else {
                                    $('#load_more_product').remove();
                                    $('#product_home').append(data);
                                }
                            }

                        });
                    }

                    $(document).on('click', '#load_more_product', function() {
                        if (isDoubleClicked($(this))) return;
                        var id = $(this).data('id');
                        $('#load_more_product').html('<b>Loading...</b>');
                        load_more(id);



                    });



                    // alert(footer + 50);



                    // alert(id);
                    // if(id.offsetTop > 3094){
                    // $(window).scroll(function() {
                    //     //     var footer =  $('#footer').height();
                    //     id = $('#load_more_product').data('id');

                    //     // alert($(document).height() -400);
                    //     // alert($(window).scrollTop() + $(window).height());
                    //     if (($(window).scrollTop() + $(window).height()) >= $(document).height()) {


                    //         $('#load_more_product').html('<b>Loading...</b>');

                    //         load_more(id)


                    //     }



                    //     //alert($(window).scrollTop());
                    //     //var aaa = id1.offsetTop - ($(window).scrollTop() + $(window).height());
                    //     //     var idd1 =   $(document).scrollTop() + $(window).height();
                    //     // alert(idd1);
                    //     //  alert(id.offsetTop);
                    //     // var sbHeight = window.innerHeight * (window.innerHeight / document.body.offsetHeight);
                    //     // alert(sbHeight);


                    // });



                }
            })();
        </script>
        <script>
            (function() {


                function searchAjax($data) {
                    $.ajax({
                        method: 'post',
                        url: '{{ url('/searchAjax') }}',
                        timeout: 3000,
                        data: {

                            data: $data,
                        },
                        success: function(data) {

                            $('#searchAjax').html(data);
                        }
                    });
                }


                function delay(callback, ms) {
                    var timer = 0;
                    return function() {
                        var context = this,
                            args = arguments;
                        clearTimeout(timer);
                        timer = setTimeout(function() {
                            callback.apply(context, args);
                        }, ms || 0);
                    };
                }
                $('#searchAjaxProduct').keyup(delay(function(e) {
                    data = $(this).val()
                    if (data == null) {
                        searchAjax('');
                    } else {
                        searchAjax(data);
                    }
                }, 500));

                // $('#searchAjaxProduct').keyup(function(){
                //     data = $(this).val()
                //    if(data == null){
                //     searchAjax('');
                //    }else{
                //     searchAjax(data);
                //    }
                // });

                $('#FormsearchAjaxProduct').submit(function(e) {
                    if ($('#searchAjaxProduct').val() == '') {
                        e.preventDefault();

                    }

                });


                $('#searchAjaxProduct').blur(function() {
                    searchAjax('');
                });

            })();
        </script>
        <script>
            (function() {
                $('.addtocart').click(function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    @if (Auth::check())
                        AddCartAjax(id);
                    @else
                        window.location.href = "{{ url('/login.html') }}";
                    @endif

                });
                $('#detailCartProduct').click(function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    @if (Auth::check())
                        AddCartAjax(id);
                    @else
                        window.location.href = "{{ url('/login.html') }}";
                    @endif

                });
            })();

            function AddCartAjax($product_id) {
                $.ajax({
                    url: '{{ url('/add-cart-ajax') }}',
                    method: 'POST',
                    data: {
                        product_id: $product_id,
                    },
                    success: function(data) {
                        $('#dropdowncart').html(data);
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{ url('/show-cart-ajax.html') }}";
                            });

                    }

                });
            }
        </script>
        <script>
            $('#btnSeeMore').click(function(e) {

                $('#cartFormProduct').submit(function(e) {

                    e.preventDefault();
                });

                window.location.href = "{{ url('/home.html') }}";
            });
        </script>
    </body>
