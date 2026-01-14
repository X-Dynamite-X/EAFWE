<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function board()
    {
        return view('pages.public.about.board');
    }

    public function history()
    {
        return view('pages.public.about.history');
    }

    public function programs()
    {
        return view('pages.public.programs');
    }

    public function photos()
    {
        return view('pages.public.gallery.photos');
    }

    public function videos()
    {
        return view('pages.public.gallery.videos');
    }

    public function faq()
    {
        return view('pages.public.faq');
    }
}
