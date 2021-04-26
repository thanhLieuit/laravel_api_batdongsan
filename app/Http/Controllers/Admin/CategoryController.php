<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Validator;
use Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $category = Category::all();
      
        return view('admin.pages.category.list', compact("category"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.pages.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $validator = Validator::make($request->all(),[
            'name_categorys' => 'required|min:2|max:255',
              ],
               [
                    'required' => ':attribute không được để trống',
                    'min' => ':attribute phải đủ từ 2 kí tự',
                    'max' => ':attribute phải đủ từ 2-255 kí tự',
              ] 
              );
        if ($validator->fails()) {
          return response()->json(['error'=> 'true', 'message' => $validator->errors()],200);
        }else{
             
            Category::create([
                'name_categorys' => $request->name_categorys,
                'slug' => Str::slug($request->name_categorys, '-'),
                'status' =>  $request->status,
                         ]);
            return response()->json(['error'=> 'false', 'message' =>'success'],200);
            } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $category=Category::find($id);
        return response()->json($category, 200);
      
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name_categorys' => 'required|min:2|max:255',
              ],
               [
                    'required' => ':attribute không được để trống',
                    'min' => ':attribute phải đủ từ 2 kí tự',
                    'max' => ':attribute phải đủ từ 2-255 kí tự',
              ] 
              );
         if($validator->fails()){
         return response()->json( ['error' => $validator->errors()],200);
        }
        $category = Category::find($id);
        $category ->update([
            'name_categorys' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'status' => $request->status,
        ]);
         $data = Category::find($id);
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);                                         
        $category->delete();
        return response()->json(['success'=>'xáo thành công']);
    }
}
