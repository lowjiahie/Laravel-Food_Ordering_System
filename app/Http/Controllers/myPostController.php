<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForumValidation;
use App\Models\Post;

class myPostController extends Controller {

    public function index() {
        $post = Post::where('account_id', '=', 1)
                ->get();
        return view('myPost', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('addNewPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForumValidation $request) {
        $post = new Post();
        $post->account_id = 2;
        $post->topic = $request->get('topic');
        $post->post_desc = $request->get('desc');
        $post->post_status = ('Posted');
        $post->save();
        return redirect('myPost')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchByTopic(Request $request) {
        $searchInput = $request->get('searchInput');
        $post = Post::where('topic', 'LIKE', '%' . $searchInput . '%')
                ->get();
       
            return view('searchPost', compact('post'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $post = Post::find($id);
        return view('editPost', compact('post', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ForumValidation $request, $id) {
        $post = Post::find($id);
        $post->topic = $request->get('topic');
        $post->post_desc = $request->get('desc');
        $post->save();
        return redirect('myPost');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect('myPost')->with('success', 'Information has been deleted');
    }

}
