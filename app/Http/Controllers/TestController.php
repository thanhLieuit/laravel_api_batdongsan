<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class TestController extends Controller
{
    public function index($id){
    	 $check = Product::where('id',$id)->count();
        $update1 = Product::where('id',$id)->first();
        if($check == 1)
        {
            $update = Product::find($update1->id);
            $update->like = $update1->like + 1;
           
            $update->save();
        }
       
    }
}
