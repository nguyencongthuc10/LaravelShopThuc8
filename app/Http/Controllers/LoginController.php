<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use App\User;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Session\Store;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\LoginController;
use Carbon\Carbon;

use Cache;
session_start();
class LoginController extends Controller
{
    public function login(){
        return view('password/login');
    }
    public function register(){
        return view('password/register');
    }
   
    public function executedRegister(Request $request){
        $name_register = $request->register_name;
        $phone_or_email_register = $request->register_phone_or_email;
        $pass_register = bcrypt($request->register_pass);
        $tokens_random = bin2hex(random_bytes(15)); 
        
        $user = new USer();
        $user->name_user = $name_register;
        $user->email_or_phone_user = $phone_or_email_register;
        $user->password = $pass_register;
        $user->cart_token = $tokens_random;
        $user->save();
        // $show_new = Product::orderBy('id', 'desc')->where('status_product', '1')->take('4')->get();
        // $show_highlight = Product::orderBy('id', 'desc')->where('status_product', '1')->where('highlight_product', 1)->take('4')->get();
        // $show_discount = Product::orderBy('id', 'desc')->where('status_product', '1')->where('discount_price_product', '>', 0)->take(4)->get();
        // return view('customer/home', compact('show_highlight', 'show_new', 'show_discount','show_all'));
        Session::put('message_register', 'Đăng ký tài khoản thành công');
        return redirect('/login.html');
    }
    public function executeLogin(Request $request){
        $login = [
            'email_or_phone_user' => $request->username,
            'password' => $request->user_password,
            'role' => 0
        ];
        $login1 = [
            'email_or_phone_user' => $request->username,
            'password' => $request->user_password,
            'role' => 1
        ];
      
        
       
        if (Auth::attempt($login)) {
            $show_new1 = Product::orderBy('id', 'desc')->where('status_product', '1')->take('4')->get();
            $show_highlight1 = Product::orderBy('id', 'desc')->where('status_product', '1')->where('highlight_product', 1)->take('4')->get();
            $show_discount1 = Product::orderBy('id', 'desc')->where('status_product', '1')->where('discount_price_product', '>', 0)->take(4)->get();
            return redirect('/home.html')->with('show_highlight',$show_highlight1)->with('show_discount',$show_discount1)->with('show_new',$show_new1);
        } 
        elseif(Auth::attempt($login1)){
            return view('admin/home');
        }
        else {
            Session::put('status', 'Tài khoản hoặc mật không chính xác');
            return redirect('/login.html');
            //return view('customer/login');
        }
        
    }
    public function logout(){
        Auth::logout();
        return redirect('/login.html');
    }
    
    // cập nhật mật khẩu
    public function changePassPost(Request $request){
       if(Auth::check()){
            $user = Auth::user(); 
            $user->password = bcrypt($request->changeNewPass);
            $user->save();
            Session::put('status', 'Thay đổi mật khẩu thành công');
            return redirect('/login.html');
       }else{
        $mailCustomerRequest = Session::get('mailCustomerRequest');
        $updateToken = User::where('email_or_phone_user',$mailCustomerRequest)->first();
        $updateToken->password = bcrypt($request->changePassOTP);
        $updateToken->save();
        Session::put('status', 'Thay đổi mật khẩu thành công');
        return redirect('/login.html');
       }
    }
    // vào trang change pass với token
    public function changePass($token){
        if(Auth::check()){
            
            return view('password/changePass');
        }elseif(Session::has('mailCustomerRequest')){
            $mailCustomerRequest = Session::get('mailCustomerRequest');
            $updateToken = User::where('email_or_phone_user',$mailCustomerRequest)->first();

            // ngăn chặn trường hợp vào thẳng trang
            if($updateToken->token_user == $token){
                return view('password/changePassword');
            }else{
                return redirect('/forgotPassword.html');
            }
            
        }
        else{
            return redirect('/forgotPassword.html');
        }
    }
    // POST OTP check OTP 
    public function confirmFotgot(Request $request){
        if(Session::has('mailCustomerRequest')){
            $mailCustomerRequest = Session::get('mailCustomerRequest');
            $updateToken = User::where('email_or_phone_user',$mailCustomerRequest)->first();
            $tokens_random =random_bytes(15);
            // nếu OTP đúng thì lưu token mới để dang97 nhập vào changePass
            if(Cache::get('otp_expires_time') == $request->OTPForgot){
                $updateToken->token_user = bin2hex($tokens_random);
                $updateToken->save();
                return redirect('/changePass/'.bin2hex($tokens_random).'.html');
            }else{
                return redirect('/OTPforgotPassword/'. $updateToken->token_user.'.html');
            }
   
        }else{
            return redirect('/forgotPassword.html');
        }
    }
    public function forgotPassword(){
        return view('password/forgotPassword');
    }
    // vào trang OTP với token
    public function OTPexecuteForgotPassword($token){
        if(Session::has('mailCustomerRequest')){
            $mailCustomerRequest = Session::get('mailCustomerRequest');
            $updateToken = User::where('email_or_phone_user',$mailCustomerRequest)->first();
            // ngăn chặn trường hợp vào thẳng trang
            if($updateToken->token_user == $token){
                return view('password/otpForgotPass');
            }else{
                return redirect('/forgotPassword.html');
            }

        }else{
            return redirect('/forgotPassword.html');
        }
       
        
    }
    // gừi về mail OTP và  tạo token ngăn chặn vào thằng trang OTP
    public function executeForgotPassword(Request $request){
        $OTP = mt_rand(100000,999999);
        $mailCustomer = $request->emailForgotPassword;
        // tạo token từ random
        $tokens_random =random_bytes(15);
        //bin2hex($tokens_random)
        $updateToken = User::where('email_or_phone_user',$mailCustomer)->first();
        Session::put('mailCustomerRequest',$mailCustomer);

        $updateToken->token_user = bin2hex($tokens_random);
        $updateToken->save();
       
        $otp_expires_time = Carbon::now()->addSeconds(60);
        // tạo Cache lưu OTP
        Cache::put('otp_expires_time',$OTP,$otp_expires_time);      
        $objDemo = new \stdClass();
        $objDemo->OTP = $OTP;
        Mail::to($mailCustomer)->send(new OTPMail($objDemo));
       
        return redirect('/OTPforgotPassword/'.bin2hex($tokens_random).'.html');
    }

    
}
