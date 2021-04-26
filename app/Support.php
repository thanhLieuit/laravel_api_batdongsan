<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
	protected $table = "supports";
    protected $fillable = ['id','content_spp','image','note','id_user','id_admin'];
    public $incrementing = false;

    public function errors() 
    {
       return $this->belongsToMany(Utilitie::class,'support_errors','id_support','id_error');
    }
   	public function user(){
        return $this ->belongsTo(User::class);
    }
    public function admin(){
        return $this ->belongsTo(Admin::class);
    }

}
