<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard utama (Home).
     */
    public function index()
    {
        return view('dashboard');
    }
}
