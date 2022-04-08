<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForumValidation;
use App\Models\Post;

class myPostController extends Controller {

    public function index(Request $request) {
        $accId=$request->get('account_id');
        $post = Post::where('account_id', '=', $accId)
                ->get();
        return view('myPost', compact('post'));
    }

    public function create() {
        return view('addNewPost');
    }

    public function store(ForumValidation $request) {
        $post = new Post();
        $post->account_id = $request->get('account_id');
        $post->topic = $request->get('topic');
        $post->post_desc = $request->get('desc');
        $post->post_status = ('Posted');
        $post->save();
        return redirect('myPost')->with('success', 'Information has been added');
    }

    public function searchByTopic(Request $request) {
        $searchInput = $request->get('searchInput');
        $post = Post::where('topic', 'LIKE', '%' . $searchInput . '%')
                ->get();
            return view('searchPost', compact('post'));
    }
    
    public function edit($id) {
        $post = Post::find($id);
        return view('editPost', compact('post', 'id'));
    }
    public function update(ForumValidation $request, $id) {
        $post = Post::find($id);
        $post->topic = $request->get('topic');
        $post->post_desc = $request->get('desc');
        $post->save();
        return redirect('myPost');
    }

    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect('myPost')->with('success', 'Information has been deleted');
    }

    public function viewByPostID($id)
    {
         $postId = $request->get('post_id');
         $post = Post::where('post_id', 'LIKE', '%' . $id . '%')
                ->get();
            return view('viewPost', compact('post'));
    }
}
