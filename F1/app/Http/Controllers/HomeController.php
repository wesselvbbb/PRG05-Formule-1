<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(Request $request)
    {

        return view('home', [
            'posts' => Post::latest()->filter(request(['search', 'category']))->where('is_active', '1')->get(),
            'categories' => Category::orderBy('name')->get()
        ]);
    }
}
