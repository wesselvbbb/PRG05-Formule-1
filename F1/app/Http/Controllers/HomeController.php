<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = DB::select('select * from posts');
        return view('home', ['posts' => $posts]);

//        if (request('search')){
//            $posts->where('title', 'like', '%' . request('search' . '%'));
//        }

//        return view('posts', [
//            'posts' => $posts->get()
//        ]);
    }
}
