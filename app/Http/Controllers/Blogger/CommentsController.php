<?php

namespace App\Http\Controllers\Blogger;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComment;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{
    public function storeGetComment($article_id ,StoreComment $request){
        $content = $request->content;
        $user = Auth::user();
        $comment = new Comment(compact('content','article_id'));
        $user->comments()->save($comment);
        return response()->json([$comment,$user->email]);
    }

    public function delete(Request $request){
        Comment::find($request->comment_id)->delete();
        return redirect()->back();
    }

}
