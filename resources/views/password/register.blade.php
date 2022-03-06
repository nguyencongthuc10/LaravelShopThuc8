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
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,400;1,200;1,400&display=swap"
            rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset('public/fontend/css/28.css') }}" rel="stylesheet" type="text/css" />
     <style type="text/css">
    	body{
    		background: #EA5C54;
    	}
    </style>
</head>
<body>
    <div class="login-page">
		<div class="login-content">
			<div class="login-header">
                <a href="{{URL('/login.html')}}"><i class="far fa-arrow-left"  data-toggle="tooltip"   data-html="true" data-placement="right" title="<h6>Quay lại</h6>"></i></a>
                <h3>Đăng kí</h3>
            </div>
			<form method="post" action="{{URL('/register.html')}}" id="registerForm">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <p style="text-align:center; color:red" id="checkEmailExit"></p>
                <div class="form-group">
                    <input type="text" name="register_name" class="user" id="registerName" placeholder="Họ tên" required="required" />
                    <span class="form-message"></span>
                </div>
				<div class="form-group">
                    <input type="text" name="register_phone_or_email"  id="emailRegsiterExit" class="pass" placeholder="Nhập email của bạn" required="required" />
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <input type="password" class="pass" name="register_pass" id="registerPass" placeholder="Mật khẩu" required="required" />
                <span class="form-message"></span>
                </div>
				
				
                
				<button type="submit" id="btnRegister" class="btn  btn-block btn-large btn-dn">Đăng ký</button>
                
				<span class="or">Or</span>
				<div class="button-mxh">
                    <a href="#"><img src="{{URL('public/fontend/images/fb.png')}}" alt="facebook" data-toggle="tooltip"   data-html="true" data-placement="bottom" title="<h6>Đăng nhập với Facebook</h6>"></a>
                    <a href="#"><img src="{{URL('public/fontend/images/google.png')}}" alt="google" data-toggle="tooltip" data-html="true" data-placement="bottom" title="<h6>Đăng nhập với Google</h6>"></a>
                </div>
			</form>
		</div>
	</div>
<script src="{{ asset('public/fontend/js/jquery.js') }}"></script>
<script src="{{ asset('public/fontend/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('public/fontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/fontend/js/validatortuiche.js') }}"></script>
<script src="{{ asset('public/fontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('public/fontend/js/swiper.js') }}"></script>
<script src="{{ asset('public/fontend/js/jquery.magnify.js') }}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('public/fontend/js/xzoom.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.1/umd/react.production.min.js">

</script>
    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    }); 
   </script> 
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });    
         
    </script>
    <script>
        Validator({
            form: '#registerForm',
            errorMessage: '.form-message',
            rules: [
                Validator.isRequired('#registerName','Vui lòng không để trống tên'),
                Validator.isNameField('#registerName','Tên không hợp lệ'),
                Validator.isMinlength('#registerName', 2,'Tên không nhỏ hơn 2 kí tự'),
                Validator.isMaxlength('#registerName', 25,'Tên không lớn hơn 25 kí tự'),
               
                Validator.isRequired('#emailRegsiterExit','Vui lòng không để trống Email'),
                Validator.isEmail('#emailRegsiterExit'),

                Validator.isRequired('#registerPass','Vui lòng không để trống mật khẩu'),
                Validator.isMinlength('#registerPass',6,'Mật Khẩu không ngắn hơn 6 ký tự'),
                // Validator.isConfirmed('#password_confirmed', function() {
                //     return trường cần giông nhau;
                // }, 'message lỗii'),
                // hàm check Email invalid
                // truyền URL xử lý AJAX 
                

            ]
        });
    </script>
</body>


