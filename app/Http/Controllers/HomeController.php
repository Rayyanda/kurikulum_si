<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // If authenticated, redirect to the dashboard
            return redirect()->route('dashboard');
        } else {
            // If not authenticated, redirect to the login page
            return redirect()->route('login');
        }
    }

    public function index()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // If authenticated, redirect to the dashboard
            return redirect()->route('dashboard');
        } else {
            // If not authenticated, redirect to the login page
            return redirect()->route('login');
        }
    }
}
