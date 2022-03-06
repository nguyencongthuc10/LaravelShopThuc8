<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'customer_id','order_image' ,'order_name','order_qty', 'order_price','order_total','order_status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'order_table';
    // Một brand có nhiều product thông qua khóa ngoại id_brand
    // public function product() -> phải có model product
    // public function InfoOrder(){
    // 	return $this->belongsTo('App\InfoOrder','info_order_id','id'); //Khoá ngoại và khóa chính của bảng product
    // }
}
