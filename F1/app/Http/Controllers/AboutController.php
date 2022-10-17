<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function Show(){

        $title = 'About';
        $text = 'tekst';

        return view('about', compact('title', 'text'));
    }
}
