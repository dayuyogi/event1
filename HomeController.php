<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }

       public function adminDashboard(){

        $jml_news = \App\news::count();
        $jml_wisata = \App\wisata::count();
        $jml_event = \App\event::count();
      

        return view('home', compact('jml_news', 'jml_event', 'jml_wisata'));
    }

}
