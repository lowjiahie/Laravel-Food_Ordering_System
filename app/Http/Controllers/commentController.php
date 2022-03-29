<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForumValidation;
use App\Models\Comment;

class commentController extends Controller{
    //put your code here
     public function index()
    {
        $comment = Comment::all();
        return view('comment', compact('comment'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(ForumValidation $request)
    {
        $comment = new Comment();
        $comment->account_id = 1;
        $comment->post_id = 1;
        $comment->comment_desc = $request->get('desc');
        $comment->save();
        
        return redirect('')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        return view('myPost');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit', compact('post', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Product::find($id);
        $post->code = $request->get('code');
        $post->name = $request->get('name');
        $post->save();
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Product::find($id);
        $post->delete();
        return redirect('post')->with('success', 'Information has been deleted');
    }
}
