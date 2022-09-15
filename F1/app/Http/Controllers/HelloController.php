<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function show()
    {
        $title = 'Home';
        $text = 'tekst';

        return view('home', compact('title', 'text'));
    }
}
