<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view ('admin.index');
    }

    public function show() {
        return view ('admin.show', [
            'blogs'=> Blog::latest()->paginate(6),
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }

    public function destroy(Blog $blog) {
        $blog->delete();
        return back();
    }

    public function create() {
        //Create blog
        return view ('admin.create', [
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }

    public function store() {
        request()->validate([
            'photo' => ['nullable'],
            'title' => ['required'],
            'body' => ['required'],
            'slug' => ['required'],
            'category_id' => ['required', Rule::exists('categories','id')],
        ]);

        $blog = new Blog();
        $blog->title = request('title');
        $blog->slug = request('slug');
        $blog->body = request('body');
        $blog->category_id = request('category_id');
        $blog->user_id = auth()->id();
        $blog->save();

        return back();
    }
}
