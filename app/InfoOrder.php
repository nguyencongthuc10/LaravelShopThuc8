<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoOrder extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'info_name', 'info_phone','info_city', 'info_address','info_note','info_email','info_customer_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'info_order_table';
    // Một brand có nhiều product thông qua khóa ngoại id_brand
    // public function product() -> phải có model product
    // public function order(){
    // 	return $this->hasMany('App\Order','info_order_id','id'); //Khoá ngoại và khóa chính của bảng product
    // }
}
