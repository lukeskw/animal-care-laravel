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
