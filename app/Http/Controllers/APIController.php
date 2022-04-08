<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForumValidation;
use App\Models\Post;
use App\Models\Comment;

class APIController extends Controller
{
  
    public function getAllComments()
    {
        $comments = Comment::join('posts','posts.id','=','comments.post_id')
                ->join('accounts','accounts.id','=','comments.account_id')
                ->where([['topic', '=','Promotions']])
                ->select('topic','post_id','accounts.accountName as commentAccName','comments.comment_desc', 'posts.created_at as postCreated', 'posts.updated_at as postUpdated','comments.created_at as commentCreated','comments.updated_at as commentUpdated')
                ->get();

        return $this->returnJSONresponse($comments);
    }


public function returnJSONresponse($params)
    {
        if($params == "[]"){
            return response()->json([
                'success'   => true,
                'message'   => 'Record(s) Retrieval Fail',
                'data'      => "Comments not found"
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Record(s) Retrieval Success',
            'data'      => $params
        ]);
    }
}
