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
     *url('/').
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function referral()
    {
        return "<html> 
        <head> 
        <title>Redirigir al navegador a otra URL</title> 
        <META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=http://localhost:8000/register/?ref=" . \Hashids::encode(auth()->user()->id) . "\">  

        </head> 
        </html>

        ";


    }
}
