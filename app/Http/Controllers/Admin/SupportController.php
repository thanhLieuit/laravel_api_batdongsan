<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use App\Error;
use Datetime;
use DB;
use Auth;

class SupportController extends Controller
{
    public function getinsert(){
    	$error = Error::all();
    	return view('admin.pages.supporterrors.insertspp',compact('error'));
    }
    public function postinsert(Request $request){
    	$error = new Error();
        $error->name_err = $request->errors;
        $error->desription = $request->desrip;
        $error->created_at = new DateTime();
        $error->save();
        return redirect()->back();
    }
    public function getdeleteerr($id){
    	try{
             
            DB::beginTransaction();
            
             //Delete Role
            $error = Error::find($id);
            $error->delete($id);

            DB::commit(); 
       
            return redirect()->route('admin.insert-error');
        	}catch(\Exception $exception){
        	DB::rollback();
         	\Log::error('loi:'.$exception->getMessage().$exception->getLine());

    	} 
    }

    public function getsupport(Request $request){
    	$support = Support::select('supports.id','supports.note','supports.created_at','supports.content_spp','supports.image',
    	DB::raw('GROUP_CONCAT(errors.desription) as desription')
		)
    	->join('support_errors','support_errors.id_support','=','supports.id')
    	->join('errors','support_errors.id_error','=','errors.id')
    	->GroupBY('supports.id','supports.note','supports.created_at','supports.content_spp','supports.image')
    	->get();
    	return view('admin.pages.supporterrors.table-support-err',compact('support'));
    }
    public function postsupportprocessing($id){
    	$support = Support::find($id);
        $support->note ="Đang xử Lý";
        $support->id_admin =auth::user()->id;
        $support->updated_at = New DateTime();
        $support->save();
    	return redirect()->back();
    }
    public function getsupportdone($id){
    	$support = Support::find($id);
        $support->note ="Xử Lý Xong";
        $support->id_admin =auth::user()->id;
        $support->updated_at = New DateTime();
        $support->save();
    	return redirect()->back();
    }
}
