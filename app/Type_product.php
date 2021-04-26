<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_product extends Model
{
	protected $table = "type_products";
    protected $fillable = ['id','name_type','slug','image','id_category'];
    public $incrementing = false;

    public function category () {
        return $this->belongsTo(Category::class,'id_category','id');
    }
    public function product(){
        return $this -> hasMany(Product::class,'id_type','id');
    }

}
