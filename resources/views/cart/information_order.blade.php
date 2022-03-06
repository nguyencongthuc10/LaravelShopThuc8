@extends('index')
@section('noidung')
<div class="view__gioihang">
	<div class="container">
        <div id='nz-div'>
            <h3 class="tde">      
                <span class="null">Đơn hàng của bạn</span>  
            </h3>
        </div>
        @if (!$OrderFirst == '')
		<table>
			<thead>
				<tr>
					<th>Hình ảnh</th>
					<th>Tên sản phẩm</th>
					<th>Số lượng</th>
					<th>Giá</th>
					<th>Tổng</th>
					<th>Tình trạng</th>
				</tr>
			</thead>
            @php
                $total = 0;
				
            @endphp
			<tbody>
				@foreach ($Order as $key => $cart) 
                   @php
                        $totalProduct = $cart['product_qty'] * $cart['product_price'];
                        // mỗi lần lặp thì cộng tổng sản phẩm lại
                        $total += $totalProduct;
                   @endphp
                <tr>
					<td>
						<div class="img__gioihang">
							<img src="{{URL('public/updates/product/'. $cart->order_image)}}" alt="bg" width="80px" height="80px">
						</div>
					</td>
					<td>
						<span class="name__gioihang">
							{{$cart->order_name}}

						</span>
					</td>
					<td>
						<span class="soluong__gioihang">
							{{$cart->order_qty}}
						</span>
					</td>
					<td>
						<span class="price__gioihang">
							{{$cart->order_price}}
						</span>
					</td>
					<td>
						<span class="tong__gioihang">
							{{$cart->order_total}}
						</span>
					</td>
					<td>
						@if ($cart->order_status == 0)
							<span style="color:red;font-weight:600">Đang xử lý</span>
						@elseif ($cart->order_status == 1)
						<span style="color:red;font-weight:600">Đã nhận đơn</span>
						@elseif ($cart->order_status == 2)
						<span style="color:red;font-weight:600">Đơn hàng bị hủy</span>
						@else
						<span style="color:red;font-weight:600">Giao hàng thành công</span>
						@endif
					</td>
				</tr>
                    
                @endforeach
                
				
 
			</tbody>
		</table>
		

	
    @else
        <div style="height:214px;">
            <h3 style="text-align:center" >Chưa có sản phẩm nào trong đơn hàng</h3>
			<div class="button__gioihang">
				<button id="btnSeeMore" class="nhanxet__button"><i class="far fa-arrow-left" style="margin-right: 5px;"></i>Tiếp tục xem sản phẩm</button>
				
			</div>
        </div>
    @endif
	</div>
</div>
@endsection