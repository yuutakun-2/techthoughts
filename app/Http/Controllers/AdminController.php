<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
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

    public function create() {
        //Create blog
        return view ('admin.create', [
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }

    public function store() {
        request()->validate([
            'photo' => ['nullable','image'],
            'title' => ['required'],
            'body' => ['required'],
            'slug' => ['required'],
            'category_id' => ['required', Rule::exists('categories','id')],
        ]);

        $blog = new Blog();
        $blog->photo = '/' . request('photo')->store('/blogs', 'public');
        $blog->title = request('title');
        $blog->slug = request('slug');
        $blog->body = request('body');
        $blog->category_id = request('category_id');
        $blog->user_id = auth()->id();
        $blog->save();

        return redirect('/admin/blogs');
    }

    public function edit(Blog $blog) {
        return view('admin.edit', [
            'blog' => $blog,
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }

    public function update(Blog $blog) {
        request()->validate([
            'photo' => ['nullable','image'],
            'title' => ['required'],
            'body' => ['required'],
            'slug' => ['required'],
            'category_id' => ['required', Rule::exists('categories','id')],
        ]);

        if (request('photo')) {
            //This saves the photo path as /blogs/photo.jpg
            $blog->photo = '/' . request('photo')->store('/blogs', 'public');
        }
        $blog->title = request('title');
        $blog->slug = request('slug');
        $blog->body = request('body');
        $blog->category_id = request('category_id');
        $blog->save();

        return redirect('/admin');
    }

    public function destroy(Blog $blog) {
        $path = public_path('storage' . $blog->photo);
        if ($blog->photo && File::exists($path)) {
            File::delete($path);
        }
        $blog->delete();
        return back();
    }
}