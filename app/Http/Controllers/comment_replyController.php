<?php

namespace App\Http\Controllers;
use App\Models\savecomment;
use App\Models\replycomment;
use Illuminate\Http\Request;

class comment_replyController extends Controller
{ 
  public function view(){
    return view('admin.comment_reply.view',[
        'comment'=>savecomment::all()
            ]);       
    }
    public function savereply(Request $request)
    {
         $comment = new replycomment();
         $comment->comment_id=$request->comment_id;
         $comment->reply=$request->reply;
         $comment->save();
        return back()->with('message','info create successfully');
    }

   

    public function reply($id){
        $comment = savecomment::find($id);
        return view('admin.comment_reply.reply', compact('comment'));
    }

    public function update(Request $request, $id){
        
        $comment=new replycomment();
        $comment->comment_id= $id;
        $comment->reply= $request->reply;
        $comment->update();
        return redirect()->route('admin.comment_reply.view');
    }
    public function delete($id)
    {
        $comment = savecomment::where('id', $id)->delete();
        return redirect()->route('admin.comment_reply.view');
    }
  
}
