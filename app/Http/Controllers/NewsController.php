<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('pages.public.news.index');
    }

    public function show($slug)
    {
        return view('pages.public.news.show', compact('slug'));
    }

    public function press()
    {
        return view('pages.public.media.press');
    }

    public function coverage()
    {
        return view('pages.public.media.coverage');
    }
}
