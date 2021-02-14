<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\subject;
use DB;
class subjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $subject=DB::table('subjects')->get();
       return response()->json($subject);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
          'subject_id' => 'required',
          'subject_name' => 'required|unique:subjects|max:25',
          'subject_code' => 'required|unique:subjects|max:25'
    ]);
        $data=array();
         $data['subject_id']=$request->subject_id;
        $data['subject_name']=$request->subject_name;
        $data['subject_code']=$request->subject_code;
        DB::table('subjects')->insert($data);
         // $subject=subject::create($request->all());
        return response('inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $show=DB::table('subjects')->where('id',$id)->first();
        return response()->json($show);
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
        $data=array();
        $data['subject_id']=$request->subject_id;
        $data['subject_name']=$request->subject_name;
        $data['subject_code']=$request->subject_code;
        DB::table('subjects')->where('id',$id)->update($data);
        return response('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       DB::table('subjects')->where('id',$id)->delete();
       return response('delete');
    }
}
