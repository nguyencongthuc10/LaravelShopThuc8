@extends('index')
@section('noidung')

<div class="thanhtoan__final">
	<div class="container">
	
		@if (!Session::get(Auth::user()->cart_token) == '' )
		<form action="{{URL('executeOrder.html')}}" method="POST" id="PaymentForm">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="row">
				<div class="col-md-8">
					<h3>Thông tin thanh toán</h3>
					@if (!$Info == '')
					<div class="form-group">
						<label for="#">Tên*</label>
						<input type="text"  class="thanhtoan__name form-control" value="{{$Info->info_name}}" name="thanhtoan__name" id="paymentName">
						<span class="form-message"></span>
					</div>
					<div class="form-group">
						<label for=""#>Địa chỉ*</label>
						<input type="text"  class="thanhtoan__address form-control" value="{{$Info->info_address}}" name="thanhtoan__address" id="paymentAdress">
						<span class="form-message"></span>
					</div>
					<div class="form-group">
						<label for="#">Tỉnh / thành phố*</label>
						<input type="text"  class="thanhtoan__city form-control" value="{{$Info->info_city}}" name="thanhtoan__city" id="paymentTinh">
						<span class="form-message"></span>
					</div>
					
					<div class="form-group">
						<label for=""#>Số  điện thoại*</label>
						<input type="text"  class="thanhtoan__phone form-control" value="{{$Info->info_phone}}" name="thanhtoan__phone" id="paymentPhone" >
						<span class="form-message"></span>
					</div>

					<div class="form-group">
						<label for=""#>Email*</label>
						<input type="email"  id="paymentEmail" name="thanhtoan__email" value="{{$Info->info_email}}" class="thanhtoan__email form-control">
						<span class="form-message"></span>
					</div>
					<div class="form-group">
						<label for="#">Ghi chú đơn hàng(tùy chọn)</label>
						<textarea rows="4" cols="50"  class="thanhtoan__ghichu form-control" value="{{$Info->info_note}}" style="resize: none;"></textarea>
						<span class="form-message"></span>
					</div>
					@else
					<div class="form-group">
						<label for="#">Tên*</label>
						<input type="text"  class="thanhtoan__name form-control" name="thanhtoan__name" id="paymentName">
						<span class="form-message"></span>
					</div>
					<div class="form-group">
						<label for=""#>Địa chỉ*</label>
						<input type="text"  class="thanhtoan__address form-control" name="thanhtoan__address" id="paymentAdress">
						<span class="form-message"></span>
					</div>
					<div class="form-group">
						<label for="#">Tỉnh / thành phố*</label>
						<input type="text"  class="thanhtoan__city form-control"  name="thanhtoan__city" id="paymentTinh">
						<span class="form-message"></span>
					</div>
					
					<div class="form-group">
						<label for=""#>Số  điện thoại*</label>
						<input type="text"  class="thanhtoan__phone form-control"name="thanhtoan__phone" id="paymentPhone" >
						<span class="form-message"></span>
					</div>

					<div class="form-group">
						<label for=""#>Email*</label>
						<input type="email"  id="paymentEmail" name="thanhtoan__email"  class="thanhtoan__email form-control">
						<span class="form-message"></span>
					</div>
					<div class="form-group">
						<label for="#">Ghi chú đơn hàng(tùy chọn)</label>
						<textarea rows="4" cols="50"  class="thanhtoan__ghichu form-control"  style="resize: none;"></textarea>
						<span class="form-message"></span>
					</div>
					@endif
	
				</div>
				<div class="col-md-4">
					<div class="thanhtoan__right">
						<h3>Đơn hàng của bạn</h3>
						<table>
							<tr>
								<th>Sản phẩm</th>
								<th>Tổng</th>
							</tr>
							@php
								$total = 0;
							@endphp
							@foreach (Session::get(Auth::user()->cart_token) as $key => $value)
							@php
								$subtotal = $value['product_price'] * $value['product_qty'];
								$total += $subtotal;
							@endphp
 							<tr>
								<td>{{$value['product_name']}} x {{$value['product_qty']}}</td>
								<td>{{$subtotal}}</td>
							</tr>
							@endforeach
							
							
							<tr>
								<td>Giao hàng</td>
								<td>Giao hàng miễn phí</td>
							</tr>
							<tr>
								<td>Tổng</td>
								<td>{{$total}}</td>
							</tr>
						</table>
						<div class="thanhtoan__dathang">
							<h3>Thanh toán bằng:</h3>
							<ul>
								<li>
									
									<input type="radio" id="thanhtoan1" name="thanhtoan__payment" value="0" checked>
									<label for="thanhtoan1">Trả tiền mặt khi nhận hàng</label><br>
									<input type="radio" id="thanhtoan1" name="thanhtoan__payment" value="1">
									<label for="thanhtoan12">Chuyển khoản ngân hàng</label><br>  
								</li>
								
								<li>
									<button type="submit" class="nhanxet__button">Đặt hàng</button>
								</li>
							</ul>
						</div>

					</div>
				</div>
			</div>
		</form>	
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
<script>
	 Validator({
            form: '#PaymentForm',
            errorMessage: '.form-message',
            rules: [
                Validator.isRequired('#paymentName','Vui lòng không để trống'),  
				Validator.isMinlength('#paymentName',2,'Tên không nhỏ hơn 2 kí tự'),
				Validator.isNameField('#paymentName','Tên không hợp lệ'),
				Validator.isMaxlength('#paymentName', 25,'Tên không lớn hơn 25 kí tự'), 
				Validator.isRequired('#paymentAdress','Vui lòng không để trống'),
				Validator.isRequired('#paymentTinh','Vui lòng không để trống'),
				Validator.isRequired('#paymentPhone','Vui lòng không để trống'), 
				Validator.isNumber('#paymentPhone','Vui lòng nhập số'),
				Validator.isMinlength('#paymentPhone',10,'Tên không nhỏ hơn 10 kí tự'),
				Validator.isMaxlength('#paymentPhone', 11,'Tên không lớn hơn 11 kí tự'),
				Validator.isRequired('#paymentEmail','Vui lòng không để trống'),
				Validator.isEmail('#paymentEmail'),
                
            ]
    });
</script>
@endsection
