<?php

    namespace App\Http\Controllers;
    use App\Models\Post;
    use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Post::create($input);
        return redirect()->route('post.index')
            ->with('success','Post created!');
    }


    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success','User updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')
            ->with('success','User deleted successfully');
    }
}

