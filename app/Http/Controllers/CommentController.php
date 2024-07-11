<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog) {
        // Backend validation
        request()->validate([
            'body' => 'required'
        ]);

    $blog->comments()->create([
        'user_id' => auth()->id(),
        'body' => request('body')
    ]);
//         $comment = new Comment();
//         $comment->blog_id = $blog->id;
//         $comment->user_id = auth()->id();
//         $comment->body = request('comment');
//         $comment->save();
    return back();
    }   
}