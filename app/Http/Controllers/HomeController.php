<?php

namespace App\Http\Controllers;

use App\Product;

session_start();
class HomeController extends Controller
{
    public function index()
    {
        $show_new = Product::orderBy('id', 'desc')->where('status_product', '1')->take('4')->get();
        $show_highlight = Product::orderBy('id', 'desc')->where('status_product', '1')->where('highlight_product', 1)->take('4')->get();
        $show_discount = Product::orderBy('id', 'desc')->where('status_product', '1')->where('discount_price_product', '>', 0)->take(4)->get();
       
        return view('customer/home', compact('show_highlight', 'show_new', 'show_discount','show_all'));
    }

    // Show contact
    public function contact()
    {
        return view('customer/contact');
    }
    // Show introduce
    public function introduce()
    {
        return view('customer/introduce');
    }
}