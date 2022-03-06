@extends('index')
@section('noidung')
<div class="donghonam" id="test">
	<div class="video">
		<video width="100%" src="{{URL('public/fontend/images/video.mp4')}}" muted loop autoplay></video>
	</div>
	<div class="container">
		<h3 class="title-comm"><span class="title-holder">Thương hiệu</span></h3>
		<div class="thuonghieu-dhnam">

			<div class="row-collapse">
				
				@foreach ($brand as $key => $brand_image)
                    <div class="col ">
                        <div class="paddding-th" id="findBrandImagae">
                            
                            <input type="image" name="brandimage" value="{{$brand_image->id}}" alt="{{$brand_image->imagae_brand}}" title="{{$brand_image->name_brand}}"
                                src="{{URL('public/updates/brand/'.$brand_image->image_brand)}}">
                        </div>
                    </div>
                
                    
                @endforeach
			</div>


		</div>
		<div id='nz-div'>
			<h3 class="tde">			
				<span class="null">Tìm kiếm</span>	
			</h3>
		</div>
		<div class="timkiem-dhtnam">

			<ul id="watchLi">
				<li id="allwatch" title="Tất cả" >Tất cả</li>
				<li id="duoi2tr" title="Dưới 2 triệu" >Dưới 2 triệu</li>
                <li id="2den5tr" title="Từ 2 - 5 triệu">Từ 2 - 5 triệu</li>
                <li id="5den10tr" title="Từ 5 - 10 triệu">Từ 5 - 10 triệu</li>
                <li id="10den20tr" title="Từ 10 - 20 triệu">Từ 10 - 20 triệu</li>
                <li id="tren20tr" title="Trên 20 triệu">Trên 20 triệu</li>
				

			</ul>

		</div>
		<div class="sx">
			
			<div class="sx-theo">
				<select name="sx" id="sxwatch" class="sx-dhnam">
					<option value="00">Sắp xếp</option>
					<option value="11">Giá cao đến thấp</option>
					<option value="22">Giá thấp đến cao</option>

				</select>
			</div>
		</div>
		<div class="sanpham">
			<div class="row-sp" id="product_watch">
				
				
				

			</div>
		</div>
	</div>
</div>
@endsection


@section('javascript')
<script>
     (function(){
                if ($('#product_watch') !== null) {
               
                var idWatch = '';
                var data1 = 0;
                var data2 = 0;
                var classify = 1;
                var sortWatch = '';
                var last_price = '';
                sessionStorage.setItem('data1', 0);
                sessionStorage.setItem('data2', 0);
                watchAjax(0, 0, '', classify, '', '');

                function watchAjax($data1, $data2, $id, $classify, $sortWatch, $last_price) {
                    $.ajax({
                        method: 'post',
                        url: '{{ url('/watchAjax') }}',
                        data: {

                            data1: $data1,
                            data2: $data2,
                            id: $id,
                            classify: $classify,
                            sortWatch: $sortWatch,
                            last_price: $last_price,
                        },
                        success: function(data) {
                            if (data == '') {
                                $('#load_more_watch').remove();
                                return;
                            } else {
                                $('#load_more_watch').remove();
                                $('#product_watch').append(data);
                            }

                        }

                    });
                }

                function dungchung($this) {
                    document.getElementById('sxwatch').value = "00";
                    $this.siblings().removeClass('active');
                    $this.addClass('active');
                    data1 = sessionStorage.getItem('data1');
                    data2 = sessionStorage.getItem('data2');
                    sortWatch = '';
                    $('#product_watch').html('');
                }
                $(document).on('click', '#load_more_watch', function(e) {
                    if (isDoubleClicked($(this))) return;
                    idWatch = $(this).data('id');
                    $('#load_more_watch').html('<b>Loading...</b>');
                    data1 = sessionStorage.getItem('data1');
                    data2 = sessionStorage.getItem('data2');
                    last_price = $(this).data('price');
                    watchAjax(data1, data2, idWatch, classify, sortWatch, last_price);



                });

                // $(window).scroll(function() {
                //     if ($(window).scrollTop() + $(window).height()>=  $(document).height()) { 
                //         var id = $('#load_more_watch').data('id');
                //         $('#load_more_watch').html('<b>Loading...</b>');
                //          watchAjax(data1, data2, id,classify);

                //     }
                // });   
                // lấy ra tất cả thẻ có name là brandimage
                //  var elements = document.querySelectorAll('.brandimage'); 

                //Thêm vào 1 sự kiện click
                // elements.addEventListener("click", function(e) { 
                //  });

                // từ id findBrandImagae tìm thẻ input
                // var adu = $('#findBrandImagae').find('input');

                //lấy tất cả phần tử con từ id findBrandImagae và lặp tất cả và click theo từng phần tử con
                var children = document.querySelectorAll('#findBrandImagae>input');
                var watchLi = $("#watchLi>li");

                children.forEach((child) => {
                    child.addEventListener('click', function(event) {
                        if (isDoubleClicked($(this))) return;
                        document.getElementById('sxwatch').value = "00";
                        watchLi.removeClass();
                        id_brand = $(this).val();
                        sessionStorage.setItem('data1', id_brand);
                        sessionStorage.setItem('data2', 99);
                        data1 = sessionStorage.getItem('data1');
                        data2 = sessionStorage.getItem('data2');
                        sortWatch = '';
                        $('#product_watch').html('');
                        watchAjax(data1, data2, '', classify, '', '');

                    });
                });
                //click theo id và find all brother of id and  removeClass, the addClass

                $('#allwatch').click(function() {
                    if (isDoubleClicked($(this))) return;
                    sessionStorage.setItem('data1', 0);
                    sessionStorage.setItem('data2', 0);
                    dungchung($(this));
                    watchAjax(data1, data2, '', classify, '', '');
                });
                $('#duoi2tr').click(function() {
                    if (isDoubleClicked($(this))) return;
                    sessionStorage.setItem('data1', 2000000);
                    sessionStorage.setItem('data2', 0);
                    dungchung($(this));
                    watchAjax(data1, data2, '', classify, '', '');
                });
                $('#2den5tr').click(function() {
                    if (isDoubleClicked($(this))) return;
                    sessionStorage.setItem('data1', 2000000);
                    sessionStorage.setItem('data2', 5000000);
                    dungchung($(this));
                    watchAjax(data1, data2, '', classify, '', '');

                });
                $('#5den10tr').click(function() {
                    if (isDoubleClicked($(this))) return;
                    sessionStorage.setItem('data1', 5000000);
                    sessionStorage.setItem('data2', 10000000);
                    dungchung($(this));
                    watchAjax(data1, data2, '', classify, '', '');
                });
                $('#10den20tr').click(function() {
                    if (isDoubleClicked($(this))) return;
                    sessionStorage.setItem('data1', 10000000);
                    sessionStorage.setItem('data2', 20000000);
                    dungchung($(this));
                    watchAjax(data1, data2, '', classify, '', '');
                });
                $('#tren20tr').click(function() {
                    if (isDoubleClicked($(this))) return;
                    sessionStorage.setItem('data1', 20000000);
                    sessionStorage.setItem('data2', 0);
                    dungchung($(this));
                    watchAjax(data1, data2, '', classify, '', '');
                });

                $('#sxwatch').change(function() {
                    sortWatch = $('#sxwatch').val();
                    data1 = sessionStorage.getItem('data1');
                    data2 = sessionStorage.getItem('data2');

                    $('#product_watch').html('');
                    watchAjax(data1, data2, '', classify, sortWatch, '');

                });

            }
            })();
            
</script>
@endsection