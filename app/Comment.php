<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'product_id','content_comment', 'name_comment','email_comment'
    ];

    protected $primaryKey = 'id';
    protected $table = 'comment_table';
    // Một brand có nhiều product thông qua khóa ngoại id_brand
    // public function product() -> phải có model product
    // public function product(){
    // 	return $this->hasMany('App\Product','id_brand','id'); //Khoá ngoại và khóa chính của bảng product
    // }
}
