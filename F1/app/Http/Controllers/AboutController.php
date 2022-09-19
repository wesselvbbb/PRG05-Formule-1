<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function Show(){
        $title = 'About';
        $text = 'tekst';

        return view('home', compact('title', 'text'));
    }
}
