<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilitie extends Model
{
	protected $table = "utilities";
    protected $fillable = ['name_uitilie','image','note'];
    public $incrementing = false;

  	public function products() 
    {
       return $this->belongsToMany(Product::class,'utilities_product','id_product','id_utilitie');
    }

}
