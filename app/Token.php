<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
	protected $table = "tokens";
    protected $fillable = ['id','token','id_user'];
    public $incrementing = false;

    public function user () {
        return $this->belongsTo(Type_product::class,'id_user','id');
    }
   

}
