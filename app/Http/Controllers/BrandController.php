<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Http\Requests;
use Session;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BrandController extends Controller
{
    public function home(){
        
        return view('admin/add_brand');
        // return view('welcome', compact('name', 'age'));
    }
    
    public function save(Request $request){
        $data = $request->all();
        $save_brand = new Brand();
        $save_brand->name_brand = $data['add_name_brand'];
        $save_brand->slug_brand	=Str::slug($request->add_name_brand, '-').'-'.Carbon::now('Asia/Ho_Chi_Minh')->timestamp;
        $save_brand->desc_brand = $data['add_desc_brand'];
        $save_brand->status_brand = $data['brand_product_status'];
        $get_img = $request->file('add_img_brand');
     	if ($get_img) {
     		// lay ten img gom cả đuôi vs .jpg .png
     		$get_img_name = $get_img->getClientOriginalName();
     		// cat chuoi tại . và lấy phần đàu
     		$name_img = current(explode('.', $get_img_name));
     		// noi chuổi 
     		$new_img = $name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
     		// noi luu hinh anh 
     		$get_img->move('public/updates/brand',$new_img);
    
     		$save_brand->image_brand = $new_img;

            $save_brand->save();
	    	// tạo thông báo thêm thành công
	    	Session::put('messge_brand','Thêm thương hiệu '. $request->add_name_brand .' thành công.');
	    	return Redirect('/all-brand');
           
        }
        $save_brand->image_brand = '';
        $save_brand->save();
        Session::put('messge_brand','Thêm thương hiệu '. $request->add_name_brand .' thành công.');
	    return Redirect('/all-brand');
    }
    public function show_all(){
        $all_paginate_brand = Brand::paginate(10);
        return view('admin/show_brand',compact('all_paginate_brand'));
    }
    public function edit($id){
        $info_edit = Brand::find($id);
        return view('admin/edit_brand', compact('info_edit'));
    }
    public function update($id,Request $request){
        $data = $request->all();
        $all_brand = Brand::all();
        $update_brand = Brand::find($id);
        $update_brand->name_brand = $data['update_name_brand'];
        
        $update_brand->desc_brand = $data['update_desc_brand'];
        $update_brand->status_brand = $data['update_status_brand'];
        $get_img = $request->file('update_img_brand');
        if ($get_img) {
            // lay ten img gom cả đuôi vs .jpg .png
            $get_img_name = $get_img->getClientOriginalName();
            // cat chuoi tại . và lấy phần đàu
            $name_img = current(explode('.', $get_img_name));
            // noi chuổi 
            $new_img = $name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
            // noi luu hinh anh 
            $get_img->move('public/updates/brand',$new_img);
   
            $update_brand->image_brand = $new_img;

           $update_brand->save();
           // tạo thông báo thêm thành công
           Session::put('messge_cnbrand','Cập nhật thương hiệu '. $request->add_name_brand .' thành công.');
          
           return Redirect('/all-brand');

       }
       $update_brand->save();
       Session::put('messge_cnbrand','Cập nhật thương hiệu '. $request->add_name_brand .' thành công.');
       return Redirect('/all-brand');
    }


    public function delete($id){
        $delete_brand = Brand::find($id);
        $delete_brand->delete();
        Session::put('messge_xoabrand','Xóa thương hiệu thành công.');
        return Redirect('/all-brand');
    }

    public function unactive($id){
        $unactive = Brand::find($id);
        $unactive->status_brand = '0';
        $unactive->save();
        return Redirect('/all-brand');
    }

    public function active($id){
        $active = Brand::find($id);
        $active->status_brand = '1';
        $active->save();
        return Redirect('/all-brand');
    }
}
