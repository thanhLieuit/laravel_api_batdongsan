<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use App\Error;
use App\User;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Auth;
use JWTAuth;
use App\Token;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject as JWTSubject;

class SupportController extends Controller
{	
	private $supports;
    private $errors;
    private $user;
    public function __construct(Support $supports, Error $errors,User $user)
    {
      
        $this->supports = $supports;
        $this->errors = $errors;
        $this->user = $user;
    }
    public function add(Request $request){

        $noidung = $request->input('content_spp');
        $user = JWTAuth::authenticate($request->token);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'batdongsan/' . Str::slug($name,'-').'.'.$file->getClientOriginalExtension();
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $fileName = 'https://agreedict-reading.s3-ap-southeast-1.amazonaws.com/'.$filePath.'';

                 
                $supports_id = Support::insertGetId([
                    
                    'content_spp' => $noidung,
                    'image' =>  $fileName,
                    'note' => 'Chờ Xử Lý',
                    'id_user' =>$user->id,
                ]);

                $support = Support::select('id')->where('id',$supports_id)->first();
               // $product->utilities()->attach([1,2,4]);
                $support->errors()->attach($request->id_error);

        }else {
              	$supports_id = Support::insertGetId([
                    
                    'content_spp' => $noidung,
                    'note' => 'Chờ Xử Lý',
                    'id_user' =>$user->id,
                ]);
           		$support = Support::select('id')->where('id',$supports_id)->first();
               // $product->utilities()->attach([1,2,4]);
                $support->errors()->attach($request->id_error);
        }
     
         return response()->json([
        
            'user' => $user,
        ]);
    }
    public function view(){
      
        $support = Support::get();
        return response()->json([
        
            'user' => $support,
        ]);
    }
}
