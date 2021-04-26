<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
	protected $table = "errors";
    protected $fillable = ['id','name_err','desription'];
    public $incrementing = false;

    public function supports() 
    {
       return $this->belongsToMany(Utilitie::class,'support_errors','id_support','id_error');
    }
   

}
