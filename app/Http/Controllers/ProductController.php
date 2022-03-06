<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Brand;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

session_start();
class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_paginate = Product::orderBy('id', 'DESC')->paginate(10);
        return view('admin/show_product', compact('product_paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::all();
        return view('admin/add_product', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $add_product = new Product();
        $add_product->name_product = $request->add_name_product;
        $add_product->slug_product = Str::slug($request->add_name_product, '-') . '-' . Carbon::now('Asia/Ho_Chi_Minh')->timestamp;
        $add_product->price_product = $request->add_price_product;
        $add_product->discount_price_product = $request->add_discount_price_product;
        $add_product->desc_product = $request->add_desc_product;
        $add_product->content_product = $request->add_content_product;
        $add_product->id_brand = $request->brand_product;
        $add_product->status_product = $request->product_status;
        $add_product->classify_product = $request->product_classify;
        $add_product->highlight_product = $request->add_highlight_product;
        //Thêm hình ảnh sản phẩm
        $get_img = $request->file('add_img_product');
        if ($get_img) {
            $this->add_image($add_product, $get_img, 'image_product');
        }

        //Thêm hình ảnh 1 chi tiết sản phẩm
        $get_img1 = $request->file('add_detail_1_img_product');

        if ($get_img1) {
            $this->add_image($add_product, $get_img1, 'detail1_image_product');
        }
        //Thêm hình ảnh 2 chi tiết sản phẩm
        $get_img2 = $request->file('add_detail_2_img_product');
        if ($get_img2) {
            $this->add_image($add_product, $get_img2, 'detail2_image_product');
        }
        //Thêm hình ảnh 3 chi tiết sản phẩm
        $get_img3 = $request->file('add_detail_3_img_product');
        if ($get_img3) {
            $this->add_image($add_product, $get_img3, 'detail3_image_product');
        }
        //Thêm hình ảnh 4 chi tiết sản phẩm
        $get_img4 = $request->file('add_detail_4_img_product');
        if ($get_img4) {
            $this->add_image($add_product, $get_img4, 'detail4_image_product');
        }

        $add_product->save();
        Session::put('messge_sp', 'Thêm sản phẩm ' . $request->add_name_product . ' thành công.');
        return Redirect('/products');

    }
    /**
     *
     * Function add image
     *
     *
     * */
    public function add_image($add_product, $get_img, $name_add_img)
    {
        $get_img_name = $get_img->getClientOriginalName();
        $name_img = current(explode('.', $get_img_name));
        $new_img = $name_img . rand(0, 99) . '.' . $get_img->getClientOriginalExtension();
        $get_img->move('public/updates/product', $new_img);
        $add_product->$name_add_img = $new_img;

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_product = Product::find($id);
        $brand = Brand::all();
        return view('admin/edit_product', compact('edit_product', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_product = Product::find($id);
        $update_product->name_product = $request->update_name_product;

        $update_product->price_product = $request->update_price_product;
        $update_product->discount_price_product = $request->update_discount_price_product;
        $update_product->desc_product = $request->update_desc_product;
        $update_product->id_brand = $request->brand_product;
        $update_product->status_product = $request->update_status_product;
        $update_product->highlight_product = $request->update_highlight_product;
        $update_product->classify_product = $request->update_classify_product;
        //Cập nhật hình ảnh sản phẩm
        $get_img = $request->file('update_img_product');
        if ($get_img) {
            $this->add_image($update_product, $get_img, 'image_product');
        }

        //Cập nhật hình ảnh 1 chi tiết sản phẩm
        $get_img1 = $request->file('update_detail_1_img_product');

        if ($get_img1) {
            $this->add_image($update_product, $get_img1, 'detail1_image_product');
        }
        //Cập nhật hình ảnh 2 chi tiết sản phẩm
        $get_img2 = $request->file('update_detail_2_img_product');
        if ($get_img2) {
            $this->add_image($update_product, $get_img2, 'detail2_image_product');
        }
        //Cập nhật hình ảnh 3 chi tiết sản phẩm
        $get_img3 = $request->file('update_detail_3_img_product');
        if ($get_img3) {
            $this->add_image($update_product, $get_img3, 'detail3_image_product');
        }
        //Cập nhật hình ảnh 4 chi tiết sản phẩm
        $get_img4 = $request->file('update_detail_4_img_product');
        if ($get_img4) {
            $this->add_image($update_product, $get_img4, 'detail4_image_product');
        }

        $update_product->save();
        Session::put('messge_cnsp', 'Cập nhật sản phẩm ' . $request->update_name_product . ' thành công.');
        return Redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        Session::put('messge_xoasp', 'Xóa sản phẩm  thành công.');
        return Redirect('/products');
    }

    public function unactive($id)
    {
        $unactive = Product::find($id);
        $unactive->status_product = '0';
        $unactive->save();
        return Redirect('/products');
    }

    public function active($id)
    {
        $active = Product::find($id);
        $active->status_product = '1';
        $active->save();
        return Redirect('/products');
    }
    public function un_active_highlight($id)
    {
        $unactive_highlight = Product::find($id);
        $unactive_highlight->highlight_product = '0';
        $unactive_highlight->save();
        return Redirect('/products');
    }
    public function active_highlight($id)
    {
        $active_highlight = Product::find($id);
        $active_highlight->highlight_product = '1';
        $active_highlight->save();
        return Redirect('/products');
    }

    public function loadMore(Request $request)
    {
        $product_final = Product::orderBy('id', 'ASC')->where('status_product', '1')->take(1)->get();
        $last_id;
        if ($request->id > 0) {

            $product_all = Product::where('status_product', '1')->where('id', '<', $request->id)->orderBy('id', 'DESC')->take(4)->get();
        } else {
            $product_all = Product::where('status_product', '1')->orderBy('id', 'DESC')->take(4)->get();
        }
        $output = '';

        if (!$product_all->isEmpty()) {
            foreach ($product_all as $key => $product_watch) {
                $last_id = $product_watch->id;
                $output .= '
                <div class="col-sp-3">
                    <div class="body-sanpham">

                            <div class="img-pr">
                                <img src="' . URL('public/updates/product/' . $product_watch->image_product) . '" alt="' . $product_watch->image_product . '">
                            </div>
                            <div class="bao-pr">
                                        <div class="name-price-pr">';

                if ($product_watch->discount_price_product > 0) {
                    $output .= '
                                            <div class="pt-discount">
                                                <span>-' . $product_watch->discount_price_product . '%</span>
                                            </div>
                                            ';
                }
                $output .= '
                                                    <span class="name_product">' . $product_watch->name_product . ' -';

                if ($product_watch->classify_product === 0) {
                    $output .= ' Nam và Nữ';
                } elseif ($product_watch->classify_product === 1) {
                    $output .= 'Đồng hồ Nam';
                } else {
                    $output .= 'Đồng hồ Nữ';
                }

                $output .= '
                                            </span>
                                        </div>
                                <div class="price-discount"> ';
                if ($product_watch->discount_price_product > 0) {
                    $output .= '
                                        <span
                                            style="color:red;font-weight:bold">' . number_format($product_watch->price_product - ($product_watch->price_product / 100) * $product_watch->discount_price_product) . ' ' . 'VND' . '</span>
                                        <span
                                            class="discount">' . number_format($product_watch->price_product) . ' ' . 'VND' . '</span> ';
                } else {
                    $output .= '
                                       <span>' . number_format($product_watch->price_product) . ' ' . 'VND' . '</span>
                                       ';
                }

                $output .= '
                                </div>

                                <div class="btn-cart-detail">';
                                if(Auth::check()){
                                    $output .= '
                                    <a href="javascript:;"  onclick="AddCartAjax(' . $product_watch->id . ')"><button class="pr-cart" id="idCart"> <i class="fal fa-shopping-cart"></i></button></a>
                                    ';
                                }else{
                                    $output .= '
                                    <a href="'.URL('/login.html').'"><button class="pr-cart" id="idCart"> <i class="fal fa-shopping-cart"></i></button></a>
                                    ';
                                }
               $output .= '               
                                <a href="' . URL('detail-product/' . $product_watch->slug_product) . '.html' . '"><button class="pr-detail">Chi tiết <i class="far fa-angle-double-right"></i></button></a>
                                </div>
                            </div>

                    </div>
                </div>

                ';
            }
            foreach ($product_final as $product) {

                if ($last_id == $product->id) {
                    $output .= '';
                } else {
                    $output .= '
            <div id="load_more"  style="display:contents;margin-top:20px;">
            <button type="button" style="margin-top: 20px;" name="load_more_product" class="btn btn-primary form-control" data-id="' . $last_id . '" id="load_more_product">
                Xem thêm sản phẩm
            </button>
            </div>';
                }
            }

        } else {
            $output = '';

        }

        echo $output;

    }
    // Chi tiết sản phấm
    public function detail_product(Request $request, $slug)
    {
        $slug_final = trim($slug, ".html");
        $detail_product1 = Product::where('slug_product', $slug_final)->get();
       
        if(!$detail_product1->isEmpty()){
            $id_brand;
            foreach ($detail_product1 as $detail_product) {
                $id_brand = $detail_product->id_brand;
            }
            
            $related = Product::where('status_product', '1')->where('id_brand', $id_brand)->orderBy('id', 'DESC')->whereNotIn('slug_product', [$slug_final])->take(4)->get();
           
            return view('customer/detail_product', compact('detail_product1', 'related'));
        }
        return redirect('home.html');
        

    }
    // Phân loại sản phẩm
    public function watch()
    {
        $brand = Brand::all();

        return view('customer/watch_man', compact('brand'));
    }
    public function watchAjax(Request $request)
    {
        $watch_product = '';
        $product_final;
        $last_price;
        $data1 = $request->data1;
        $data2 = $request->data2;
        $id = $request->id;
        $sortWatch = $request->sortWatch;
        $classify = $request->classify;
        $price_final = $request->last_price;
        // $data1,$data2,$price_final,$classify
        function watchProductNotId($sortWatch, $data1, $data2, $classify)
        {
            if ($sortWatch == 00) {
                if ($data1 == 0 && $data2 == 0) {
                    $watch_product = Product::orderBy('id', 'DESC')->where('status_product', '1')->where('classify_product', $classify)->take(4)->get();

                } elseif ($data1 == 2000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('price_product', '<=', $data1)->orderBy('id', 'DESC')->take(4)->get();

                } elseif ($data1 == 20000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->orderBy('id', 'DESC')->take(4)->get();

                } elseif ($data2 == 99) {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('id_brand', '=', $data1)->orderBy('id', 'DESC')->take(4)->get();
                } else {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->where('price_product', '<=', $data2)->orderBy('id', 'DESC')->take(4)->get();
                }

            } elseif ($sortWatch == 11) {
                if ($data1 == 0 && $data2 == 0) {
                    $watch_product = Product::orderBy('price_product', 'DESC')->where('status_product', '1')->where('classify_product', $classify)->take(4)->get();

                } elseif ($data1 == 2000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('price_product', '<=', $data1)->orderBy('price_product', 'DESC')->take(4)->get();

                } elseif ($data1 == 20000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->orderBy('price_product', 'DESC')->take(4)->get();

                } elseif ($data2 == 99) {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('id_brand', '=', $data1)->orderBy('price_product', 'DESC')->take(4)->get();

                } else {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->where('price_product', '<=', $data2)->orderBy('price_product', 'DESC')->take(4)->get();
                }

            } elseif ($sortWatch == 22) {
                if ($data1 == 0 && $data2 == 0) {
                    $watch_product = Product::orderBy('price_product', 'ASC')->where('status_product', '1')->where('classify_product', $classify)->take(4)->get();
                } elseif ($data1 == 2000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('price_product', '<=', $data1)->orderBy('price_product', 'ASC')->take(4)->get();
                } elseif ($data1 == 20000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->orderBy('price_product', 'ASC')->take(4)->get();

                } elseif ($data2 == 99) {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('id_brand', '=', $data1)->orderBy('price_product', 'ASC')->take(4)->get();

                } else {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->where('price_product', '<=', $data2)->orderBy('price_product', 'ASC')->take(4)->get();

                }

            } else {

                if ($data1 == 0 && $data2 == 0) {
                    $watch_product = Product::orderBy('id', 'DESC')->where('status_product', '1')->where('classify_product', $classify)->take(4)->get();
                } elseif ($data1 == 2000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('price_product', '<=', $data1)->orderBy('id', 'DESC')->take(4)->get();

                } elseif ($data1 == 20000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->orderBy('id', 'DESC')->take(4)->get();

                } elseif ($data2 == 99) {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('id_brand', '=', $data1)->orderBy('id', 'DESC')->take(4)->get();

                } else {
                    $watch_product = Product::where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->where('price_product', '<=', $data2)->orderBy('id', 'DESC')->take(4)->get();
                }
            }
            return $watch_product;

        }

        function watchProductId($sortWatch, $data1, $data2, $price_final, $id, $classify)
        {

            if ($sortWatch == 11) {
                if ($data1 == 0 && $data2 == 0) {
                    $watch_product = Product::orderBy('price_product', 'DESC')->where('status_product', '1')->where('price_product', '<', $price_final)->where('classify_product', $classify)->take(4)->get();

                } elseif ($data1 == 2000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')
                        ->where('classify_product', $classify)->where('price_product', '<=', $data1)->where('price_product', '<', $price_final)->orderBy('price_product', 'DESC')->take(4)->get();} elseif ($data1 == 20000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')
                        ->where('classify_product', $classify)->where('price_product', '>=', $data1)->where('price_product', '<', $price_final)->orderBy('price_product', 'DESC')->take(4)->get();
                } elseif ($data2 == 99) {
                    $watch_product = Product::where('status_product', '1')
                        ->where('classify_product', $classify)->where('price_product', '<', $price_final)->where('id_brand', '=', $data1)->orderBy('price_product', 'DESC')->take(4)->get();

                } else {
                    $watch_product = Product::where('status_product', '1')
                        ->where('classify_product', $classify)->where('price_product', '>=', $data1)->where('price_product', '<=', $data2)->where('price_product', '<', $price_final)->orderBy('price_product', 'DESC')->get();}

            } elseif ($sortWatch == 22) {
                if ($data1 == 0 && $data2 == 0) {
                    $watch_product = Product::orderBy('price_product', 'ASC')->where('status_product', '1')->where('price_product', '>', $price_final)->where('classify_product', $classify)->take(4)->get();
                } elseif ($data1 == 2000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')
                        ->where('classify_product', $classify)->where('price_product', '<=', $data1)->where('price_product', '>', $price_final)->orderBy('price_product', 'ASC')->take(4)->get();} elseif ($data1 == 20000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')
                        ->where('classify_product', $classify)->where('price_product', '>', $price_final)->where('price_product', '>=', $data1)->where('id_brand', '=', $data1)->orderBy('price_product', 'ASC')->take(4)->get();
                } elseif ($data2 == 99) {
                    $watch_product = Product::where('status_product', '1')->where('id_brand', '=', $data1)
                        ->where('classify_product', $classify)->where('price_product', '>', $price_final)->where('id_brand', '=', $data1)->orderBy('price_product', 'ASC')->take(4)->get();
                } else {
                    $watch_product = Product::where('status_product', '1')
                        ->where('classify_product', $classify)->where('price_product', '>=', $data1)->where('price_product', '<=', $data2)->where('price_product', '>', $price_final)->orderBy('price_product', 'ASC')->take(4)->get();

                }

            } else {

                if ($data1 == 0 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')->where('id', '<', $id)->where('classify_product', $classify)->orderBy('id', 'DESC')->take(4)->get();
                } elseif ($data1 == 2000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')->where('id', '<', $id)
                        ->where('classify_product', $classify)->where('price_product', '<=', $data1)->orderBy('id', 'DESC')->take(4)->get();
                } elseif ($data1 == 20000000 && $data2 == 0) {
                    $watch_product = Product::where('status_product', '1')->where('id', '<', $request->id)
                        ->where('classify_product', $classify)->where('price_product', '>=', $data1)->orderBy('id', 'DESC')->take(4)->get();
                } elseif ($data2 == 99) {
                    $watch_product = Product::where('status_product', '1')->where('id', '<', $id)
                        ->where('classify_product', $classify)->where('id_brand', '=', $data1)->orderBy('id', 'DESC')->take(4)->get();
                } else {
                    $watch_product = Product::where('status_product', '1')->where('id', '<', $id)
                        ->where('classify_product', $classify)->where('price_product', '>=', $data1)->where('price_product', '<=', $data2)->orderBy('id', 'DESC')->take(4)->get();}
            }
            return $watch_product;

        }

        function productFinal($sortWatch, $data1, $data2, $classify)
        {

            if ($sortWatch == 11) {
                if ($data1 == 0 && $data2 == 0) {
                    $product_final = Product::orderBy('price_product', 'ASC')->where('status_product', '1')->where('classify_product', $classify)->take(1)->get();

                } elseif ($data1 == 2000000 && $data2 == 0) {
                    $product_final = Product::orderBy('price_product', 'ASC')->where('status_product', '1')->where('classify_product', $classify)->where('price_product', '<=', $data1)->take(1)->get();

                } elseif ($data1 == 20000000 && $data2 == 0) {
                    $product_final = Product::orderBy('price_product', 'ASC')->where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->take(1)->get();

                } elseif ($data2 == 99) {
                    $product_final = Product::orderBy('price_product', 'ASC')->where('status_product', '1')->where('classify_product', $classify)->where('id_brand', '=', $data1)->take(1)->get();
                } else {
                    $product_final = Product::orderBy('price_product', 'ASC')->where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->where('price_product', '<=', $data2)->take(1)->get();
                }

            } elseif ($sortWatch == 22) {
                if ($data1 == 0 && $data2 == 0) {
                    $product_final = Product::orderBy('price_product', 'DESC')->where('status_product', '1')->where('classify_product', $classify)->take(1)->get();
                } elseif ($data1 == 2000000 && $data2 == 0) {
                    $product_final = Product::orderBy('price_product', 'DESC')->where('status_product', '1')->where('classify_product', $classify)->where('price_product', '<=', $data1)->take(1)->get();
                } elseif ($data1 == 20000000 && $data2 == 0) {
                    $product_final = Product::orderBy('price_product', 'DESC')->where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->take(1)->get();

                } elseif ($data2 == 99) {
                    $product_final = Product::orderBy('price_product', 'DESC')->where('status_product', '1')->where('classify_product', $classify)->where('id_brand', '=', $data1)->take(1)->get();
                } else {
                    $product_final = Product::orderBy('price_product', 'DESC')->where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->where('price_product', '<=', $data1)->take(1)->get();

                }

            } else {

                if ($data1 == 0 && $data2 == 0) {
                    $product_final = Product::orderBy('id', 'ASC')->where('status_product', '1')->where('classify_product', $classify)->take(1)->get();
                } elseif ($data1 == 2000000 && $data2 == 0) {
                    $product_final = Product::orderBy('id', 'ASC')->where('status_product', '1')->where('classify_product', $classify)->where('price_product', '<=', $data1)->take(1)->get();

                } elseif ($data1 == 20000000 && $data2 == 0) {
                    $product_final = Product::orderBy('id', 'ASC')->where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->take(1)->get();

                } elseif ($data2 == 99) {
                    $product_final = Product::orderBy('id', 'ASC')->where('status_product', '1')->where('classify_product', $classify)->where('id_brand', '=', $data1)->take(1)->get();

                } else {
                    $product_final = Product::orderBy('id', 'ASC')->where('status_product', '1')->where('classify_product', $classify)->where('price_product', '>=', $data1)->where('price_product', '<=', $data2)->take(1)->get();

                }
            }
            return $product_final;

        }
        $product_final = productFinal($sortWatch, $data1, $data2, $classify);

        $last_id;
        if ($request->id > 0) {
            $watch_product = watchProductId($sortWatch, $data1, $data2, $price_final, $id, $classify);

        } else {
            $watch_product = watchProductNotId($sortWatch, $data1, $data2, $classify);
        }

        $output = '';

        if (!$watch_product->isEmpty()) {
            foreach ($watch_product as $key => $product_watch) {
                $last_id = $product_watch->id;
                $last_price = $product_watch->price_product;
                $output .= '
                <div class="col-sp-3">
                    <div class="body-sanpham">

                            <div class="img-pr">
                                <img src="' . URL('public/updates/product/' . $product_watch->image_product) . '" alt="' . $product_watch->image_product . '">
                            </div>
                            <div class="bao-pr">
                                        <div class="name-price-pr">';

                if ($product_watch->discount_price_product > 0) {
                    $output .= '
                                            <div class="pt-discount">
                                                <span>-' . $product_watch->discount_price_product . '%</span>
                                            </div>
                                            ';
                }
                $output .= '
                                                    <span class="name_product">' . $product_watch->name_product . ' -';

                if ($product_watch->classify_product === 0) {
                    $output .= ' Nam và Nữ';
                } elseif ($product_watch->classify_product === 1) {
                    $output .= 'Đồng hồ Nam';
                } else {
                    $output .= 'Đồng hồ Nữ';
                }

                $output .= '
                                            </span>
                                        </div>
                                <div class="price-discount"> ';
                if ($product_watch->discount_price_product > 0) {
                    $output .= '
                                        <span
                                            style="color:red;font-weight:bold">' . number_format($product_watch->price_product - ($product_watch->price_product / 100) * $product_watch->discount_price_product) . ' ' . 'VND' . '</span>
                                        <span
                                            class="discount">' . number_format($product_watch->price_product) . ' ' . 'VND' . '</span> ';
                } else {
                    $output .= '
                                       <span>' . number_format($product_watch->price_product) . ' ' . 'VND' . '</span>
                                       ';
                }

                $output .= '
                                </div>

                                <div class="btn-cart-detail">';
                                if(Auth::check()){
                                    $output .='<a href="javascript:;"  onclick="AddCartAjax(' . $product_watch->id . ')"><button class="pr-cart" > <i class="fal fa-shopping-cart"></i></button></a>
                                    ';
                                }else{
                                    $output .='
                                    <a href="'.URL('login.html').'" "><button class="pr-cart" > <i class="fal fa-shopping-cart"></i></button></a>
                                    ';
                                }
                $output .='                
                                <a href="' . URL('detail-product/' . $product_watch->slug_product) . '.html' . '"><button class="pr-detail">Chi tiết <i class="far fa-angle-double-right"></i></button></a>
                                </div>
                            </div>

                    </div>
                </div>

                ';
            }

            foreach ($product_final as $product) {

                if ($last_id == $product->id) {
                    $output .= '';
                } else {
                    $output .= '
                    <div id="load_more"  style="display:contents;margin-top:20px;">
                    <button type="button" style="margin-top: 20px;" name="load_more_watch" class="btn btn-primary form-control" data-id="' . $last_id . '" data-price="' . $last_price . '" id="load_more_watch">
                        Xem thêm sản phẩm
                    </button>
                    </div>';
                }
            }

        } else {
            $output = '';

        }

        echo $output;

    }
    public function searchAjax(Request $request)
    {
        $data = $request->data;
        $result = '';
        if ($data == null) {
            echo $result;
            return;
        } else {
            $resultSearch = Product::orderBy('id', 'DESC')->where('name_product', 'LIKE', "%$data%")->get();
        }
        $result .= '
        <div class="suggestSearch">
            <ul>
        ';

        if (!$resultSearch->isEmpty()) {
            foreach ($resultSearch as $resultForeach) {
                $result .= '
                <li>
                    <a href="' . URL('detail-product/' . $resultForeach->slug_product) . '.html' . '">
                        <img src="' . URL('public/updates/product/' . $resultForeach->image_product) . '" alt="' . $resultForeach->image_product . '">
                        <div class="search_nameandPrice">
                            <h3>' . $resultForeach->name_product . '</h3>
                            <span>' . number_format($resultForeach->price_product) . ' ' . 'VND' . '</span>
                        </div>
                    </a>
                </li>

                ';
            }
            $result .= '
        </ul>
        </div>';
        } else {
            $result = '';
        }

        echo $result;

    }
    public function searchProduct(Request $request)
    {
        $data = $request->keyword;
        if ($data == null) {
            $resultSearchProduct = null;
        } else {
            $resultSearchProduct = Product::orderBy('id', 'DESC')->where('name_product', 'LIKE', "%$data%")->get();
        }

        return view('customer/search_product', compact('resultSearchProduct'));
    }
}