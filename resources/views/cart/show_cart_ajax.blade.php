@extends('index')
@section('noidung')
<div class="view__gioihang">
	<div class="container">
       
        @if (!Session::get(Auth::user()->cart_token) == '')
		{{-- <form action="" method="POST" id="cartFormProduct"> --}}
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<table>
			<thead>
				<tr>
					<th>Hình ảnh</th>
					<th>Tên sản phẩm</th>
					<th>Số lượng</th>
					<th>Giá</th>
					<th>Tổng</th>
				</tr>
			</thead>
            @php
                $total = 0;
            @endphp
			<tbody>
				@foreach (Session::get(Auth::user()->cart_token) as $key => $cart) 
                   @php
                        $totalProduct = $cart['product_qty'] * $cart['product_price'];
                        // mỗi lần lặp thì cộng tổng sản phẩm lại
                        $total += $totalProduct;
                   @endphp
                <tr>
					<td>
						<div class="img__gioihang">
							<a href="javascript:;" data-id ="{{$cart['product_id']}}" class="deleteCartAjaxProduct"><i class="far fa-times-circle"></i></a>
							<img src="{{URL('public/updates/product/'.$cart['product_image'])}}" alt="bg" width="80px" height="80px">
						</div>
					</td>
					<td>
						<span class="name__gioihang">
							{{$cart['product_name']}}

						</span>
					</td>
					<td>
						<span class="soluong__gioihang">
							<div class="num-block skin-2">

								<div class="num-in">
									<span  class="minus dis"></span>
									<input type="text" class="in-num" data-id="{{$cart['product_id']}}" value="{{$cart['product_qty']}}" min="1" max="99" readonly="">
									<span  class="plus"></span>
								</div>
							</div>
						</span>
					</td>
					<td>
						<span class="price__gioihang">
							{{$cart['product_price']}}
						</span>
					</td>
					<td>
						<span class="tong__gioihang">
							{{$totalProduct}}
						</span>
					</td>
				</tr>
                    
                @endforeach
                
				
 
			</tbody>
		</table>
		<div class="total__quality-gioihang">
			<ul>
				<li>
					Tổng phụ
					<span>{{$total}}</span>
				</li>
				<li>
					Thuế
					<span>1000vnd</span>
				</li>
				<li>
					Phí vận chuyển
					<span>1000vnd</span>
				</li>
				<li>
					Thành tiền
					<span>1000vnd</span>
				</li>
			</ul>
			
		<div class="button__gioihang">
			<button id="btnSeeMore" class="nhanxet__button"><i class="far fa-arrow-left" style="margin-right: 5px;"></i>Tiếp tục xem sản phẩm</button>
			<a  href="{{URL('/thanh-toan.html')}}">
				<button type="button"  class="nhanxet__button">Thanh toán</button>
			</a>
		</div>
		</div>


	
    @else
        <div style="height:214px;">
            <h3 style="text-align:center" >Chưa có sản phẩm nào trong giở hàng</h3>
			<div class="button__gioihang">
				<button id="btnSeeMore" class="nhanxet__button"><i class="far fa-arrow-left" style="margin-right: 5px;"></i>Tiếp tục xem sản phẩm</button>
				
			</div>
        </div>
    @endif
	</div>
</div>

@endsection
@section('javascript')
{{-- <script {{ asset('public/fontend/js/cartAjax.js') }} ></script> --}}
<script>
    $('.deleteCartAjaxProduct').click(function(e){
        if (isDoubleClicked($(this))) return;
            e.preventDefault();
            var id = $(this).data('id');
            swal({
                    title: "Xóa sản phẩm khỏi giỏ hàng",
                    text: "Bạn có chắc muốn xóa sản phẩm này không",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Không",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Xóa",
                    closeOnConfirm: false,
  
                },
                function(isConfirm) {
                    if (isConfirm) {
                        DeleteCartAjax(id);
                         
                        swal({
                               title: "Success",
                               
                               type: "success",
                               confirmButtonText: "Xong",
                           },
                           function() {
                               window.location.href = "{{url('/show-cart-ajax.html')}}";
                           });
                    } 
                  
                });            
    });
    	function DeleteCartAjax ($product_id){
               $.ajax({
                   url: '{{url('/delete-cart-ajax')}}',
                   method: 'POST',
                   data:{
                       product_id: $product_id,
                   },
                   success:function(data){
                   
                   }

               });
         }
		
		let minus = document.querySelectorAll('.minus');
		let plus = document.querySelectorAll('.plus');
		minus.forEach((child) => {
			child.addEventListener('click', function(event) {
				if (isDoubleClicked($(this))) return;
				var qty = (child.parentElement.querySelector('.in-num').value);
				var id = (child.parentElement.querySelector('.in-num').getAttribute('data-id'));
				UpdateCartAjax(id,qty);
			});
		});
		plus.forEach((child) => {
			child.addEventListener('click', function(event) {
				if (isDoubleClicked($(this))) return;
				var qty = (child.parentElement.querySelector('.in-num').value);
				var id = (child.parentElement.querySelector('.in-num').getAttribute('data-id'));
				UpdateCartAjax(id,qty);
			});
		});

		function UpdateCartAjax ($product_id,$product_qty){
               $.ajax({
                   url: '{{url('/update-cart-ajax')}}',
                   method: 'POST',
                   data:{
                       product_id: $product_id,
					   product_qty: $product_qty,
                   },
                   success:function(data){
					window.location.href = "{{url('/show-cart-ajax.html')}}";
                   }

               });
        }
</script>

@endsection