<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request){
        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->product_id = $request->product_id;
        $comment->content_comment = $request->content_comment;
        $comment->name_comment = $request->name_comment;
        $comment->email_comment = $request->email_comment;
        $comment->save();

        $allComments = Comment::all();
        print_r($allComments);
       

        
    }
}
