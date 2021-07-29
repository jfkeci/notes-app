<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = "This is the index page";
        return view('pages.index')->with('title', $title);
    }
    public function about()
    {
        $title = "This is the about page";
        return view('pages.about')->with('title', $title);
    }
    public function contact()
    {
        $title = "Contact me!";
        return view('pages.contact')->with('title', $title);
    }
}
