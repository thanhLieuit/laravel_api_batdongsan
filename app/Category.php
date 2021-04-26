<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = "categorys";
    protected $fillable = ['id','name_categorys','slug','image'];
    public $incrementing = false;

    public function type_product () {
        return $this->hasMany(Type_product::class,'id_category','id');
    }


}
