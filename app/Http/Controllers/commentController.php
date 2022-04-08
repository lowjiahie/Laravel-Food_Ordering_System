<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\commentValidation;
use App\Models\Post;
use App\Models\Comment;

class commentController extends Controller {

    public function create() {
        return view('comment');
    }

    public function viewByPostID(Request $request) {
        $postId = $request->get('id');
        $post = Post::where('id', 'LIKE', '%' . $postId . '%')
                ->get();
        return view('addCommentPage', compact('post', 'postId'));
    }

    public function addInByID(commentValidation $request) {
        $comment = new Comment();
        $comment->post_id = $request->get('id');
        $comment->account_id = $request->get('account_id');
        $comment->comment_desc = $request->get('desc');
        $comment->save();
        return view('addCommentSuccessful');
    }

    public function xmlRead() {
        $xml = new \DOMDocument;
        $xml->load('xml/comment.xml');

        $xsl = new \DOMDocument;
        $xsl->load('xsl/comment.xsl');

        $proc = new \XSLTProcessor;
        $proc->importStylesheet($xsl);

        echo $proc->transformToXml($xml);
    }

}
