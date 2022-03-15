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
use Hash;
use Cache;


class ValidateController extends Controller
{
    public function ajaxCheckEmailExit(Request $request){
        $data = $request->data;
        $output;
        $checkEmail = User::where('email_or_phone_user',$data)->get();
   
        if($checkEmail->isEmpty()){
            echo $output = 0;
        }else{
            echo $output = 1;;
        }
    }

    public function ajaxCheckPasswordNotSame(Request $request){
        $data = $request->data;
        $output;
        //$checkEmail = User::where('password',bcrypt($data))->get();
        
        if(Hash::check($data, Auth::user()->password)){
            echo $output = 1;
        }else{
            echo $output = 0;
        }
    }
}
