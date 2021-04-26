<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Type_product;
use App\Category;
use App\Utilitie;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\User;
use Auth;
use JWTAuth;
use App\Token;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $products;
    private $utilities;
    private $user;
    public function __construct(Product $products, Utilitie $utilities,User $user)
    {
      
        $this->products = $products;
        $this->utilities = $utilities;
        $this->user = $user;
    }
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
           // 'cartKey' => 'required',
            'name_product' => 'required',
            'content' =>'required',
            'summary' => 'required',  
            'price' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        $ten = $request->input('name_product');
        $noidung = $request->input('content');
        $tomtat = $request->input('summary');
        $gia = $request->input('price');
        $loaisanpham = $request->input('id_type');
        $thanhpho = $request->input('id_tp');
        $huyen = $request->input('id_h');
        $dientich = $request->input('dientich');
        $user = JWTAuth::authenticate($request->token);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'batdongsan/' . Str::slug($name,'-').'.'.$file->getClientOriginalExtension();
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $fileName = 'https://agreedict-reading.s3-ap-southeast-1.amazonaws.com/'.$filePath.'';
            
                $product_id = $this->products::insertGetId([
                    'name_product' => $ten,
                    'content' => $noidung,
                    'summary' =>  $tomtat,
                    'price' => $gia,
                    'image' =>  $fileName,
                    'action' => 'chờ kiểm duyệt',
                    'like' => 1,
                    'dientich' => $dientich,
                    'id_type' =>$loaisanpham,
                    'id_tp' =>$thanhpho,
                    'id_h' =>$huyen,
                    'id_user' =>$user->id,
                ]);

                $product = Product::select('id')->where('id',$product_id)->first();
               // $product->utilities()->attach([1,2,4]);
                $product->utilities()->attach($request->id_utilitie);
        }else {
             $product_id = Product::insertGetId([
                'name_product' => $ten,
                'content' => $noidung,
                'summary' =>  $tomtat,
                'price' => $gia,    
                'action' => 'chờ kiểm duyệt',
                'like' => 1,
                'dientich' => $dientich,
                'id_type' =>$loaisanpham,
                'id_tp' =>$thanhpho,
                'id_h' =>$huyen,
                'id_user' =>$user->id,
            ]);
            $product = Product::select('id')->where('id',$product_id)->first();
            $product->utilities()->attach($request->id_utilitie);
        }
        $product1 =  Product::count('id');
        return response()->json([
            'Message' => 'Bạn đã thêm 1 sản phẩm ',
            'thông báo' => 'có '. $product1 .'sản phẩm', 
            'sản phẩm' => $product,
        ], 201);
    }
    public function edit(Request $request,$id)
    {
        $ten = $request->input('name_product');
        $noidung = $request->input('content');
        $tomtat = $request->input('summary');
        $gia = $request->input('price');
        $loaisanpham = $request->input('id_type');
        $thanhpho = $request->input('id_tp');
        $huyen = $request->input('id_h');
        $dientich = $request->input('dientich');
        $user = JWTAuth::authenticate($request->token);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'batdongsan/' . Str::slug($name,'-').'.'.$file->getClientOriginalExtension();
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $fileName = 'https://agreedict-reading.s3-ap-southeast-1.amazonaws.com/'.$filePath.'';
        
                $product_id = Product::where('id',$id)->update([
                    'name_product' => $ten,
                    'content' => $noidung,
                    'summary' =>  $tomtat,
                    'price' => $gia,
                    'image' =>  $file_name,
                    'dientich' => $dientich,
                    'id_type' =>$loaisanpham,
                    'id_tp' =>$thanhpho,
                    'id_h' =>$huyen,
                    'id_user' =>$user->id,
                ]);
                DB::table('utilities_product')->where('id_product',$id)->delete();
                $product = $this->products->find($id);
                $product->utilities()->attach($request->id_utilitie);
        
         }else{
            $product_id = Product::where('id',$id)->update([
                'name_product' => $ten,
                'content' => $noidung,
                'summary' =>  $tomtat,
                'price' => $gia,
                'dientich' => $dientich,
                'id_type' =>$loaisanpham,
                'id_tp' =>$thanhpho,
                'id_h' =>$huyen,
                'id_user' =>$user->id,
            ]);
            DB::table('utilities_product')->where('id_product',$id)->delete();
                $product = $this->products->find($id);
                $product->utilities()->attach($request->id_utilitie);
        }

        $product2 = Product::where('id',$id)->get();
        $product1 =  Product::count('id');
        return response()->json([
            'Message' => 'Bạn đã sửa 1 sản phẩm ',
            'thông báo' => 'có '. $product1 .'sản phẩm', 
            'sản phẩm' => $product2,
        ], 201);
    }
    public function delete(Product $product)
    {
        $path = $product->path;
        $product->delete();
        Storage::disk('s3')->delete($product->path);
        $product->utilities()->detach();
        return response()->json([
            'Message' => 'Bạn đã xóa 1 sản phẩm ',
        ], 204);
    }
    public function view($id)
    {
        $check = Product::where('id',$id)->count();
        $update1 = Product::where('id',$id)->first();
        if($check == 1)
        {
            $update = Product::find($update1->id);
            $update->like = $update1->like + 1;
            $update->save();
        }
        return response()->json([
            'sản phẩm vừa xem' => $update,
        ],201);
    }
    public function search(Request $request)
    {

        $ten = $request->input('name_product');
        $gia = $request->input('price');
        $thanhpho = $request->input('id_tp');
        $huyen = $request->input('id_h');
        $dientich = $request->input('dientich');

        $product = Product::select('products.id','name_product','content','summary','price','dientich','like','id_tp','id_h','name_uitilie','products.image')
        ->join('utilities_product','utilities_product.id_product','=','products.id')
        ->join('utilities','utilities.id','=','utilities_product.id_utilitie')
        ->where('name_product','like', '%' .$ten. '%' )
        ->where('price','like', '%' .$gia. '%' )
        ->where('dientich','like', '%' .$dientich. '%' )
        ->where('id_tp','like', '%' .$thanhpho. '%' )
        ->where('id_h','like', '%' .$huyen. '%' )
        ->get();

        $product1 = Product::where('name_product','like', '%' .$ten. '%' )
        ->where('price','like', '%' .$gia. '%' )
        ->where('dientich','like', '%' .$dientich. '%' )
        ->where('id_tp','like', '%' .$thanhpho. '%' )
        ->where('id_h','like', '%' .$huyen. '%' )
        ->count('id');

        return response()->json([
            'Message' => 'Có' .$product1.' sản phẩm tìm kiếm ',
            'sản phẩm' => $product,
        ], 201);
    }
    public function sort()
    {
        $product1 = Product::orderBy('price','asc')->get();
        $product2 = Product::orderBy('price','desc')->get();
        return response()->json([
             'Sản phẩm tăng dần' => $product1,
             'Sản phẩm giảm dần' => $product2,
        ], 201);
    }
}
