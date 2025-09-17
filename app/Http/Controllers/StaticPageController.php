<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StaticPageController extends Controller
{
    /**
     * Display the Site Welcome / Index page
     */
    public function home(): View
    {
        return view('static.welcome');
    }

    public function about(): View
    {
        //        return view('static.about');
    }

    public function contact(): View
    {
        //        return view('static.contact');
    }

    public function privacy(): View
    {
        //        return view('static.privacy');
    }

    public function terms(): View
    {
        //        return view('static.terms');
    }
}
