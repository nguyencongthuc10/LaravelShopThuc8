<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Order;
use App\InfoOrder;
use Session;
use Competition;
class CartController extends Controller
{
    // add cart
    public function addCartAjax(Request $request){
       $id = $request->product_id;
       $output = '';
        $total = 0;
        $dem = 0;
        $subtotal = 0;
       $product = Product::find($id);
       $session_id = substr(md5(microtime()),rand(0,26),5);
       $nameSessionCart = Auth::user()->cart_token;
       $cart = Session::get($nameSessionCart);
        // kiểm tra cart tồn tại không
      if($cart==true){
            // tạo biến đếm xem sản phẩm đẵ tồn tại chưa
        		$is_avaiable = 0;
                // lặp nếu sp tồn tại thì tăng biến đếm và tăng số lượng lên 1
        		foreach($cart as $key => $val){ 
        			if($val['product_id']== $id){
                        $is_avaiable++;
                       	 $cart[$key] = array(
                        'product_name' => $val['product_name'],
                        'product_id' => $val['product_id'],
                        'product_image' => $val['product_image'],
                        
                        'product_qty' => $val['product_qty'] + 1,
                        'product_price' => $val['product_price'],
                        );
                        Session::put($nameSessionCart,$cart);
                       
                    }
        		}
                // nếu chưa có sản phẩm thì thềm vào cái mới
        		if($is_avaiable == 0){
        			$cart[] = array(
        				'session_id' => $session_id,
                        'product_name' => $product->name_product,
                        'product_id' => $product->id,
                        'product_image' => $product->image_product,
                        'product_qty' => 1,
                        'product_price' => $product->price_product,
        			);
        			Session::put($nameSessionCart,$cart);
        		}
        // cart không tồn tại thì thêm vào dữ liệu mới
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $product->name_product,
                'product_id' => $product->id,
                'product_image' => $product->image_product,
                'product_qty' => 1,
                'product_price' => $product->price_product,

            );
            Session::put($nameSessionCart,$cart);
        }
    
        	Session::save();
            if(!Session::get($nameSessionCart) == ''){
                $output .='
                <div class="dropdown-cart" name="dropdown-cart">
                    <div class="group-product-cart">';
                foreach($cart as $key => $val1){
                $subtotal = $val1['product_price'] * $val1['product_qty'];
                $total += $subtotal;
                $dem++;
                $output .= '
                <div class="product-cart">
                <img src="' . URL('public/updates/product/' . $val1['product_image']).'">
                <div class="item-cart">
                   
                    <div class="div-name-pr-cart">
                    <span
                        class="name-pr-cart">'. $val1['product_name'].'
                        </span>
                    </div>
                    <div class="div-pricr-pr-cart"><span
                        class="pricr-pr-cart">'.$val1['product_price'].' x '.$val1['product_qty'].'
                        </span>
                    </div>
                </div>
                </div> 
                ';
            
                }
                $output .= '
                </div>
                <div class="price-cart"><span>Tổng :</span>'.$total.'</div>
                <div class=btn-full>
                    <a href="'.URL('show-cart-ajax.html').'"><button class="btn-cart">Xem giỏi hàng</button></a>
                    <a href="'.URL('thanh-toan.html').'"><button class="btn-pay">Thanh toán</button></a>
                    
                </div>
                </div>
                <span class="cout-cart">'.$dem.'</span> '
                ;
            }else{
                $output .= '<h3 style="text-align: center; color: #000; font-size:15px;">Chưa có sản phẩm nào trong giỏ hàng</h3>';
            }
            echo $output;
        
    }

    public function showCartAjax(){
        return view('cart/show_cart_ajax');
    }
    // delete cart
    public function deleteCartAjax(Request $request){
        $id = $request->product_id;
        $nameSessionCart = Auth::user()->cart_token;
        $cart = Session::get( $nameSessionCart);
        // tìm sản phẩm và unset ra khỏi cart và lưu lại
        foreach($cart as $key => $val){
            if($val['product_id'] == $id){
                unset($cart[$key]);
            }
        }
        Session::put( $nameSessionCart,$cart);
        Session::save();
        
       
    }
    // update cart
    public function UpdateCartAjax(Request $request){
        $id = $request->product_id;
        $qty = $request->product_qty;
        $total = 0;
       
        $nameSessionCart = Auth::user()->cart_token;
        $cart = Session::get( $nameSessionCart);
        foreach($cart as $key => $val){
            if($val['product_id'] == $id){
               
                $cart[$key] = array(
                'product_name' => $val['product_name'],
                'product_id' => $val['product_id'],
                'product_image' => $val['product_image'],
                
                'product_qty' => $qty,
                'product_price' => $val['product_price'],
                );
            }
        }
        Session::put( $nameSessionCart,$cart);
        Session::save();
        
    }

    public function thanhToan(){
        $Info = InfoOrder::where('info_customer_id',Auth::user()->id)->get()->first();
       return view('/cart.payment',compact('Info'));
    }
    public function executeOrder(Request $request){
        $paymentName = $request->thanhtoan__name;
        $paymentAddress = $request->thanhtoan__address;
        $paymentCity = $request->thanhtoan__city;
        $paymentPhone = $request->thanhtoan__phone;
        $paymentEmail = $request->thanhtoan__email;
        $paymentGhiChu = $request->thanhtoan__ghichu;
        $paymentHow = $request->thanhtoan__payment;
        $idInfo = InfoOrder::where('info_customer_id',Auth::user()->id)->get()->first();
        if(!$idInfo == ''){
            $info = InfoOrder::find($idInfo->id);
            $info->info_name = $paymentName;
            $info->info_phone = $paymentPhone;
            $info->info_city = $paymentCity;
            $info->info_address = $paymentAddress;
            $info->info_note = $paymentGhiChu;
            $info->info_email = $paymentEmail;
            $info->info_customer_id = Auth::user()->id;
            $info->save();

            
        }else{
            $info = new InfoOrder();
            $info->info_name = $paymentName;
            $info->info_phone = $paymentPhone;
            $info->info_city = $paymentCity;
            $info->info_address = $paymentAddress;
            $info->info_note = $paymentGhiChu;
            $info->info_email = $paymentEmail;
            $info->info_customer_id = Auth::user()->id;
            $info->save();
        }
        // 'customer_id', 'order_name','order_qty', 'order_price','order_total','order_status'

        $total = 0;
       
        $nameSessionCart = Auth::user()->cart_token;
        $cart = Session::get( $nameSessionCart);
        if(!$cart == ''){
            foreach($cart as $key => $val){
                $total = $val['product_price'] * $val['product_qty'];
                $order = new Order();
                $order->customer_id =  Auth::user()->id;
                $order->order_name = $val['product_name'];
                $order->order_image = $val['product_image'];
                $order->order_qty = $val['product_qty'];
                $order->order_price = $val['product_price'];
                $order->order_total = $total;
                $order->order_status = 0;
                $order->save();
            }
        }
        Session::pull( $nameSessionCart,'');
        if($paymentHow == 0){
            return redirect('/information-order.html');
        }elseif($paymentHow == 1){
            echo "payment Ngan hang";
        }
    }

    public function showinformationOrder(){
        $OrderFirst = Order::where('customer_id',Auth::user()->id)->get()->first();
        $Order = Order::where('customer_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('cart/information_order',compact('Order','OrderFirst'));
    }
}
