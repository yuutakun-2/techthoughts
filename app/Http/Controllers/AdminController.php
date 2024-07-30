<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

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
}
