<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class BlogController extends Controller
{
    //
    public function index() {
        return view ('blogs.index', [
            'blogs'=> Blog::latest()->filter(request(['query', 'category_id', 'user_id']))->paginate(6),
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }
    
    public function show(Blog $blog) {
        return view ('blogs.view', [
            'blog' => $blog
        ]);
    }

    public function community() {
        return view ('blogs.community', [
            'users' => User::all()
        ]);
    }
}
