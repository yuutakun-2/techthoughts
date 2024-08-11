<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog) {
        // Backend validation
        request()->validate([
            'body' => 'required'
        ]);

    $comment = $blog->comments()->create([
        'user_id' => auth()->id(),
        'body' => request('body')
    ]);

    //add email to subscribers function when a comment is added to a post
    //filter subscribed users except currently logged in user
    $subscribers = $blog->users->filter(function ($user) {
        return $user->id !== auth()->id();
    });

    foreach ($subscribers as $subscriber) {
        Mail::to($subscriber->email)->queue(new SubscriberMail($subscriber, $comment));
    }

//         $comment = new Comment();
//         $comment->blog_id = $blog->id;
//         $comment->user_id = auth()->id();
//         $comment->body = request('comment');
//         $comment->save();
    return back();
    }   
    
    public function destroy(Comment $comment) {
        $comment->delete();
        return back();
    }

}
