<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::paginate(5);
        $categories = Category::all();

        // Show posts from selected category
        if ($request->category) {
            $posts = Category::where('name', $request->category)->firstOrFail()->posts()->paginate(10)->withQueryString();
            return view('home', compact('posts', 'categories'));
        }

        return view('posts.index', compact('posts', 'categories'));
    }

}
