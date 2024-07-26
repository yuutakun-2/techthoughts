<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class BlogController extends Controller
{
    public function home() {
        return view ('blogs.home');
    }
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

    public function post() {
        return view ('blogs.post', [
            'blogs'=> Blog::latest()->filter(request(['query', 'category_id', 'user_id']))->paginate(6),
            'categories' => Category::all(),
            'users' => User::all()
        ]);
    }

    public function store() {
        //store title
        // request()->validate([
        //     'title' => 'required',
        //     'body' => 'required',
        // ])
        //check category
        //add image
        //store body
        //return back 
    }
}
