<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name_brand', 'slug_brand','desc_brand', 'status_brand'
    ];

    protected $primaryKey = 'id';
    protected $table = 'brand_table';
    // Một brand có nhiều product thông qua khóa ngoại id_brand
    // public function product() -> phải có model product
    public function product(){
    	return $this->hasMany('App\Product','id_brand','id'); //Khoá ngoại và khóa chính của bảng product
    }
  
}
