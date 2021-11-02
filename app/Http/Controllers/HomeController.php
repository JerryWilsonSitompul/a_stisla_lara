<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


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
        //  Alert::success('Congrats', 'You\'ve Successfully Log in');
        
        notify()->success('Hi '.Auth::user()->name.', welcome to Stisla');
        // emotify('success', 'You are awesome, your data was successfully created');
        return view('home');
    }
}
