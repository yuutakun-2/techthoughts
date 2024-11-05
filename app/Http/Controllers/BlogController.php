<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function home() {
        return view ('blogs.home', [
            'blogs'=> Blog::latest()->filter(request(['query', 'category_id', 'user_id']))->paginate(6),
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
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
        request()->validate([
            'photo' => ['nullable','image'],
            'title' => ['required'],
            'body' => ['required'],
            'slug' => ['nullable'],
            'category_id' => ['required', Rule::exists('categories','id')],
        ]);

        $blog = new Blog();
        $blog->photo = '/' . request('photo')->store('/blogs', 'public');
        $blog->title = request('title');
        $blog->slug = Str::slug(request('title'));
        $blog->body = request('body');
        $blog->category_id = request('category_id');
        $blog->user_id = auth()->id();
        $blog->save();

        return redirect('/blogs');
}
}