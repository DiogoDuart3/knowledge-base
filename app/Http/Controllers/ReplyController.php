<?php

namespace App\Http\Controllers;

use App\models\Comment;
use App\models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request, $id){
        $comment = Comment::findOrFail($id);
        $data = $this->validate($request, [
            'body' => 'required|min:2'
        ]);
        $data['user_id'] = Auth::id();
        $data['comment_id'] = $comment->id;
        $reply = Reply::create($data);
        return back();
    }

    public function destroy(Request $request, $id){
        $reply = Reply::findOrFail($id);
        if(Auth::user()->isAdmin() || $reply->user->id == Auth::id){
            $reply->delete();
            return back();
        }
    }
}
