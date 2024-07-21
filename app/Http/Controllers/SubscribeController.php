<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{   
    public function toggle(Blog $blog)
    {
        $user = auth()->user();

        if ($user->isSubscribed($blog)) {
            $user->subscribedBlogs()->detach($blog);
        } else {
            $user->subscribedBlogs()->attach($blog);
        }

        return back();
    }
}
