<?php

namespace App\Http\Controllers;

use App\models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        $data = $this->validate($request, [
            'issue_id' => 'required|exists:issues,id',
            'body' => 'required|min:2'
        ]);
        $data['user_id'] = Auth::id();
        $comment = Comment::create($data);
        return redirect(route('issue.show', $data['issue_id']));
    }
}
