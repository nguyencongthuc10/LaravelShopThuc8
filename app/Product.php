<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product_table';
    public $timestamps = false;
    protected $fillable = [
        'id_brand', 'name_product','slug_product','desc_product','price_product','image_product','status_product'
    ];
    protected $primaryKey = 'id';
  
    // Bảng Product có một brand
    // Tại sao không sử dụng HasOne.  Vì bảng product là table phụ nên sử dụng belongsTo
    // LK 1-1: Chính -> phụ: HasOne
    // LK 1-1: Phụ -> Chính:  belongsTo
    // table phụ là table có khóa ngoại Vd: product có khóa ngoại là id_brand
    public function brand(){
    	return $this->belongsTo('App\Brand','id_brand','id'); // Khóa ngoại  và khóa chính của bảng brand
    }
   
}
