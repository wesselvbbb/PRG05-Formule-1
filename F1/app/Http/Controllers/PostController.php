<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
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

    public function getPosts()
    {
        return Post::latest()->filter()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'file_path' => 'nullable|image'
        ]);

        $input['user_id'] = auth()->id();
        $input['file_path'] = request()->file('file')->store('attachments');

        Post::create($input);

        // Check if user is validated
        // When user has posted 2 or more times update is_validated to true
        if (!Auth::user()->is_validated) {
            if (Auth::user()->posts()->count() >= 2){
                $user = Auth::user();
                $user->is_validated = 1;
                $user->save();
            }
        }

        return redirect()->route('home')
            ->with('success', 'Post created!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        // Checks if post belongs to user
        // And checks if user is admin
        if ($post->user_id !== \auth()->id() && !Auth::user()->is_admin == 1) {
            abort(403);
        } else {
            $categories = Category::all();
            return view('posts.edit', compact('post', 'categories'));
        }

    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->update($request->all());

        return redirect()->route('home')
            ->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')
            ->with('success', 'Post deleted successfully');
    }

    // Change active status for posts
    public function isActive(Request $request)
    {
        $post = Post::find($request->post_id);
        $post->is_active = $request->is_active;
        $post->save();

        return redirect()->route('home');
    }
}

