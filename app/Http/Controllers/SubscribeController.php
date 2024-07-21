<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{   
    public function toggle(Blog $blog) {
        if (auth()->user()->isSubscribed($blog)) {
            //remove the user from subscribedBlogs
            auth()->user()->subscribedBlogs()->detach($blog);
        } else {
            //add the user to subscribedBlogs
            auth()->user()->subscribedBlogs()->attach($blog);
        }
        return back();
    }
}
