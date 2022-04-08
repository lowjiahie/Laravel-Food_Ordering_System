<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForumValidation;
use App\Models\Post;
use App\Models\Comment;

class forumController extends Controller {

    public function index() {
        $post = Post::all();
        return view('forum', compact('post'));
    }

    public function create() {
        return view('addNewPost');
    }

    public function viewCommentByID(Request $request) {
        $viewPostID = $request->get('id');
        $comment = Comment::join('posts','posts.id','=','comments.post_id')
                ->join('accounts','accounts.id','=','comments.account_id')
                ->where('post_id', 'LIKE', '%' . $viewPostID . '%')
                ->select('post_id','accounts.accountName as commentAccName','comments.comment_desc', 'posts.created_at as postCreated', 'posts.updated_at as postUpdated','comments.created_at as commentCreated','comments.updated_at as commentUpdated')
                ->get();
        return view('viewCommentPage', compact('comment'));
    }
}
