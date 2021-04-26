<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = "products";
    protected $fillable = ['name_product','image','content','summary','price','like','action','dientich','id_tp','id_h','id_type'];
    public $incrementing = false;

    public function type_product () {
        return $this->belongsTo(Type_product::class,'id_type','id');
    }
   	public function utilities() 
    {
       return $this->belongsToMany(Utilitie::class,'utilities_product','id_product','id_utilitie');
    }
    public function user(){
        return $this ->belongsTo(User::class);
    }
    public function admin(){
        return $this ->belongsTo(Admin::class);
    }

}
