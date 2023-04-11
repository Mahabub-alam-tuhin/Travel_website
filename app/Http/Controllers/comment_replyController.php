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
   

    public function reply($id){
        $comment = savecomment::find($id);
        return view('admin.comment_reply.reply', compact('comment'));
    }

    public function update(Request $request, $id){
        
        $this->comment=new replycomment();
        $this->comment->comment_id= $id;
        $this->comment->reply= $request->reply;
        $this->comment->update();
        return redirect()->route('admin.comment_reply.view');
    }
    public function delete($id)
    {
        $comment = savecomment::where('id', $id)->delete();
        return redirect()->route('admin.comment_reply.view');
    }
  
}
