<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Spatie\Menu\Menu;
use Spatie\Menu\Link;


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
    //     $items = [
    //     '/' => 'Home',
    //     '/about' => 'About',
    //     '/contact' => 'Contact',
    // ];

    // $realmenu = Menu::build($items, function ($menu, $label, $link) {
    //     $menu->link($link, $label);
    // });

  
        // dd($realmenu);
        return view('home');
    }
}
