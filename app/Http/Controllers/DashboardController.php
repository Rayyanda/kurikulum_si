<?php

namespace App\Http\Controllers;

use App\Models\MK;
use App\Models\BK;
use App\Models\CPL;
use App\Models\PL;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Calculate the total SKS MK
        $totalSKSMK = MK::sum('sks');

        // Calculate the total CPL
        $totalCPL = CPL::count();

        // Calculate the total BK
        $totalBK = BK::count();

        // Calculate the total PL
        $totalPL = PL::count();

        // Return the view with the data
        return view('home', compact('totalSKSMK', 'totalCPL', 'totalBK', 'totalPL'));
    }

}
