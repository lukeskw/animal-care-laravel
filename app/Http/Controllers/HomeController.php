<?php

namespace App\Http\Controllers;


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
        if (Auth::check()) {
            return view('dashboard/dash-home');
        }
        else{
        Auth::logout();
        return view('auth/logout');
    }
        
    }

}
