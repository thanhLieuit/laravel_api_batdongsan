<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use DB;
use App\Type_product;
use App\Utilitie;
use App\Product;
use Datetime;
use Auth;
use App\User;
use App\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    private $utilities;
    private $products;

    public function __construct(Utilitie $utilities, Product $products)
    {
        $this->utilities = $utilities;
        $this->products = $products;
    }

    public function getproductutilitie(){
    	$tienich = Utilitie::all();
    	return view('admin.pages.product.add-utilite',compact('tienich'));
    }
    public function postproductutilitie(Request $request){
    	if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'batdongsan/' . Str::slug($name,'-').'.'.$file->getClientOriginalExtension();
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $fileName = 'https://agreedict-reading.s3-ap-southeast-1.amazonaws.com/'.$filePath.'';
            $utilite = new Utilitie();
            $utilite->name_uitilie = $request->tienich;
            $utilite->image = $fileName;
            $utilite->note = 1;
            $utilite->created_at = new DateTime();
            $utilite->save();
        }else{
        	$utilite = new Utilitie();
            $utilite->name_uitilie = $request->tienich;
            $utilite->note = 1;
            $utilite->created_at = new DateTime();
            $utilite->save();
        }
        return redirect()->back();
    }
    public function getproductoffutilitie(Request $request, $id){
    	$utilite = Utilitie::find($id);
    	$utilite->note = 0;
    	$utilite->updated_at = new DateTime();
    	$utilite->save();
    	return redirect()->back();
    }
    public function getproductonutilitie(Request $request,$id){
    	$utilite = Utilitie::find($id);
    	$utilite->note = 1;
    	$utilite->updated_at = new DateTime();
    	$utilite->save();
    	return redirect()->back();
    }
    public function getproductdeleteutilitie($id){
    	try{
             
            DB::beginTransaction();
            
             //Delete Role
            $utilite = Utilitie::find($id);
            $utilite->delete($id);

            DB::commit(); 
       
            return redirect()->route('admin.product-utilitie');
        	}catch(\Exception $exception){
        	DB::rollback();
         	\Log::error('loi:'.$exception->getMessage().$exception->getLine());

    	} 
    }
    public function getproduct(){
    	$sanpham = Product::select('products.id','products.name_product','products.price','products.dientich','products.like','products.action','type_products.name_type','products.image','products.content','products.summary','products.id_tp','products.id_h','products.id_type')
    	->join('type_products','type_products.id','=','products.id_type')
    	->get();
    	$loaisp = Type_product::all();
       
        $tienich = Utilitie::where('note', 1)->get();

    	return view('admin.pages.product.product',compact('sanpham','loaisp','tienich'));
    }
    public function postproductadd(Request $request){
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'batdongsan/' . Str::slug($name,'-').'.'.$file->getClientOriginalExtension();
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $fileName = 'https://agreedict-reading.s3-ap-southeast-1.amazonaws.com/'.$filePath.'';

            try{
            DB::beginTransaction();
            $product = $this->products::insertGetId([
                'name_product' => $request->sanpham,
                'image' => $fileName,
                'content' => $request->noidung,
                'summary' => $request->tomtat,
                'price' => $request->gia,
                'dientich' => $request->dt,
                'like' => 1,
                'action' => $request->tt,
                'id_tp' => $request->tp,
                'id_h' => $request->qh,
                'id_type'=> $request->typesp,
                'status' => 1,
                'id_admin' => auth::user()->id,

            ]);

            $product1 = Product::select('id')->where('id',$product)->first();
            $product1->utilities()->attach($request->tienich);
            
            DB::commit();
             return redirect()->route('admin.product');

           }catch(\Exception $exception){
            DB::rollback();
            \Log::error('loi:'.$exception->getMessage().$exception->getLine());
           }
        }else{
            try{
            DB::beginTransaction();
            $product = $this->products::insertGetId([
                'name_product' => $request->sanpham,
                'content' => $request->noidung,
                'summary' => $request->tomtat,
                'price' => $request->gia,
                'dientich' => $request->dt,
                'like' => 1,
                'action' => $request->tt,
                'id_tp' => $request->tp,
                'id_h' => $request->qh,
                'id_type'=> $request->typesp,
                'status' => 1,
                'id_admin' => auth::user()->id,
            ]);
            $product1 = Product::select('id')->where('id',$product)->first();
            $product1->utilities()->attach($request->tienich);
            DB::commit();
             return redirect()->route('admin.product');

           }catch(\Exception $exception){
            DB::rollback();
            \Log::error('loi:'.$exception->getMessage().$exception->getLine());
           }
        }
    }
    public function getproductedit($id){
        $sanpham = Product::select('products.id','products.name_product','products.price','products.dientich','products.like','products.action','type_products.name_type','products.image','products.content','products.summary','products.id_tp','products.id_h','products.id_type')
        ->join('type_products','type_products.id','=','products.id_type')->where('products.id',$id)
        ->get();
        $loaisp1 = Type_product::get();
        $tienich1 = Utilitie::where('note', 1)->get();
        $getAllutilitiesproduct = DB::table('utilities_product')->where('id_product', $id)
        ->pluck('id_utilitie');

        //dd($getAllutilitiesproduct);
        return view('admin.pages.product.edit-product',compact('sanpham','loaisp1','tienich1','getAllutilitiesproduct'));
    }
    public function postproductedit(Request $request, $id){
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'batdongsan/' . Str::slug($name,'-').'.'.$file->getClientOriginalExtension();
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $fileName = 'https://agreedict-reading.s3-ap-southeast-1.amazonaws.com/'.$filePath.'';
            try{
            DB::beginTransaction();
            //update to role table
            $this->products->where('id',$id)->update([
                'name_product' => $request->sanpham,
                'image' => $fileName,
                'content' => $request->noidung,
                'summary' => $request->tomtat,
                'price' => $request->gia,
                'dientich' => $request->dt,
                'action' => $request->tt,
                'id_tp' => $request->tp,
                'id_h' => $request->qh,
                'id_type'=> $request->typesp,
                'id_admin' => auth::user()->id,
            ]);
            //update role_permission
            DB::table('utilities_product')->where('id_product',$id)->delete();
            $product = $this->products->find($id);
        //    dd($roleCreate);
            $product->utilities()->attach($request->tienich1);
            DB::commit();
            return redirect()->route('admin.product');

            }catch(\Exception $exception){
                DB::rollback();
                \Log::error('loi:'.$exception->getMessage().$exception->getLine());
            } 
        }else{
            try{
            DB::beginTransaction();
            //update to role table
            $this->products->where('id',$id)->update([
                'name_product' => $request->sanpham,
                'content' => $request->noidung,
                'summary' => $request->tomtat,
                'price' => $request->gia,
                'dientich' => $request->dt,
                'action' => $request->tt,
                'id_tp' => $request->tp,
                'id_h' => $request->qh,
                'id_type'=> $request->typesp,
                'id_admin' => auth::user()->id,
            ]);
            //update role_permission
            DB::table('utilities_product')->where('id_product',$id)->delete();
            $product = $this->products->find($id);
        //    dd($roleCreate);
            $product->utilities()->attach($request->tienich1);
            DB::commit();
            return redirect()->route('admin.product');

            }catch(\Exception $exception){
                DB::rollback();
                \Log::error('loi:'.$exception->getMessage().$exception->getLine());
            } 
        }
    }
    public function getproductdelete($id){
        try{
             DB::beginTransaction();
             //Delete Role
             $product = $this->products->find($id);
             $product->delete($id);
             //Delete role_permission
             $product->utilities()->detach();
             DB::commit();
            return redirect()->route('admin.product');
        }catch(\Exception $exception){
        DB::rollback();
         \Log::error('loi:'.$exception->getMessage().$exception->getLine());
        }
    }
    public function getproductoff(Request $request,$id){
        $product = Product::find($id);
        $product->action = 0;
        $product->updated_at = new DateTime();
        $product->save();
        return redirect()->back();
    }
    public function getproducton(Request $request, $id){
        $product = Product::find($id);
        $product->action = 1;
        $product->updated_at = new DateTime();
        $product->save();
        return redirect()->back();
    }

    public function getcategory(){
        $category = Category::get();
        return view('admin.pages.product.category',compact('category'));
    }
    public function postcategoryadd(Request $request){
        $category = new Category();
        $category->name_categorys = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->status = $request->status;
        $category->created_at = new DateTime();
        $category->save();
        return redirect()->back();
    }
    public function postcategoryedit(Request $request, $id){
        $category = Category::find($id);
        $category->name_categorys = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->status = $request->status;
        $category->updated_at = new DateTime();
        $category->save();
        return redirect()->back();
    }

    public function getcategorydelete($id){
        try{
             
            DB::beginTransaction();
            
             //Delete Role
            $category = Category::find($id);
            $category->delete($id);

            DB::commit(); 
       
            return redirect()->route('admin.category');
            }catch(\Exception $exception){
            DB::rollback();
            \Log::error('loi:'.$exception->getMessage().$exception->getLine());

        } 
    }

    public function gettypeproduct(){
        $category = Category::get();
        $type_product = Type_product::select('type_products.id','type_products.name_type','type_products.status','categorys.name_categorys','type_products.id_category')
        ->join('categorys','categorys.id','=','type_products.id_category')
        ->get();
        $category1 = Category::get();
        return view('admin.pages.product.type_product',compact('category','type_product','category1'));
    }
    public function posttypeproductadd(Request $request){
        $type_product = new Type_product();
        $type_product->name_type = $request->name;
        $type_product->slug = Str::slug($request->name, '-');
        $type_product->status = $request->status;
        $type_product->id_category = $request->id_catalogy;
        $type_product->created_at = new DateTime();
        $type_product->save();
        return redirect()->back();
    }
    public function posttypeproductedit(Request $request, $id){
        $type_product = Type_product::find($id);
        $type_product->name_type = $request->name;
        $type_product->slug = Str::slug($request->name, '-');
        $type_product->status = $request->status;
        $type_product->id_category = $request->id_catalogy;
        $type_product->updated_at = new DateTime();
        $type_product->save();
        return redirect()->back();
    }
    public function gettypeproductdelete($id){
        try{
             
            DB::beginTransaction();
            
             //Delete Role
            $type_product = Type_product::find($id);
            $type_product->delete($id);
            
            DB::commit(); 
       
            return redirect()->route('admin.type-prodcut');
            }catch(\Exception $exception){
            DB::rollback();
            \Log::error('loi:'.$exception->getMessage().$exception->getLine());

        } 
    }
}
