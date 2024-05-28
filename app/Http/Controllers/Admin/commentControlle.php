<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\commentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class commentControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Lưu trữ URL trước đó vào session
        session()->put('previous_comRep', url()->previous());
        $title="Danh sách comment";
        $commList = commentModel::where(['reply_id'=>0])->orderBy('id','DESC')->get();
        return view('Admin.Pages.comment.commentList',compact('commList','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request,$id)
    {
         $commActive = commentModel::find($id);
         $commActive->update(['status'=>1]);
         return response()->json(['data'=>'hiện']); 
         

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function notActive(Request $request,$id)
    {
        $comm_NotActive = commentModel::find($id);
        $comm_NotActive->update(['status'=>0]);
        return response()->json(['data'=>"ẩn"]); //

    }
   
    public function commRep(Request $request,$id){
        
        $validator = Validator::make($request->all(), [
          
          'comment'    => 'required',

          ],[

          'comment.required'=>'comment không được bỏ trống',

          ]);

        if ($validator->fails()) {
          
          $errors = $validator->errors();

          return response()->json(['error'=>$validator->errors()->first()]); 

        }else{

          $dataComment = new commentModel;
          $dataComment->comment = $request->comment;
          $dataComment->product_id = $request->product_id;
          $dataComment->customes_id = $request->customes_id;
          $dataComment->status = $request->status ? $request->status :0;
          $dataComment->reply_id = $request->reply_id ? $request->reply_id :0;
          $dataComment ->save();
           return response()->json(['data'=>true]); 
           
       }
    }  
    //edit commrep
    public function editCommRep(Request $request,$id){
        
      $title="Edit trả lời comment";
      $edit_repComm = commentModel::find($id);
      return view('Admin.Pages.comment.editRep',compact('edit_repComm','title'));
    }
     //up
    public function updateCommRep(Request $request,$id){
     $edit_repComm = commentModel::find($id);
     $updateCommPep = $edit_repComm->update([
        'comment'=>$request->comment,
        'reply_id'=>$request->reply_id
     ]);
      return response()->json(['data'=>true]); 
    }
    //delete rep

    public function deleteCommRep(Request $request,$id){
        $delete_repComm = commentModel::find($id);
        
        $delete_repComm->delete();
        return redirect()->route('admin.commentList')->with('success', 'Bạn vừa xóa trả lời comment');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\commentModel  $commentModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $title="Edit comment";
        $commEdit = commentModel::find($id);

        return view('Admin.Pages.comment.commentEdit',compact('commEdit','title'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\commentModel  $commentModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
       // dd($request->all());
        $commEdit = commentModel::find($id);
        $updateComm = $commEdit->update([
            'comment'=>$request->comment,
        ]);
       
       return redirect()->route('admin.commentList')->with('success', 'update comment thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\commentModel  $commentModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $comm = commentModel::find($id);
        $comm->delete();
       return redirect()->route('admin.commentList')->with('success', 'xóa comment thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\commentModel  $commentModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(commentModel $commentModel)
    {
        //
    }
}
