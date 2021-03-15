<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use DB;
class TestController extends Controller
{
     public function test(Request $request)
    {
         $validated = $request->validate([
          'id' => 'required',
          'name' => 'required|unique:teacher|max:25',
          'designationstring'=>'required|unique:teacher|max:25'
    ]);
        // $data=array();
        //  $data['id']=$request->id;
        // $data['name']=$request->name;
        // $data['designationstring']=$request->designationstring;
        // DB::table('teacher')->insert($data);
        //  // $subject=subject::create($request->all());
        // return response('inserted');
        //Using model
         $store = Teacher::create($request->all());
         return response()->json($store , 201);
    }

    public function update(Request $request,Teacher $id)
    {
        // $data=array();
        // $data['id']=$request->id;
        // $data['name']=$request->name;
        // $data['designationstring']=$request->designationstring;
        // DB::table('teacher')->where('id',$id)->update($data);
        $update=$id->update($request->all());
        return response()->json($update, 200);
    }
      public function index()
    {
      // $subject=DB::table('teacher')->get();
      //  return response()->json($subject);
    	return response()->json(Teacher::get(),200);
    }
     public function destroy(Request $request,Teacher $id)
    {
        // DB::table('teacher')->where('id',$id)->delete();
        // return response('delete');
        $id->delete();
        return response()->json(null,204);
    }
    public function show( $id)
    {
        // $show=DB::table('teacher')->where('id',$id)->first();
        // return response()->json($show);
        $show=Teacher::find($id);
        if(is_null($show)){
        return response()->json('Record not found',400);
        }
        return response()->json($show, 200);

    }
}
