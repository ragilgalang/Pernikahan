<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class StudyCaseController extends Controller
{
    /**
     * Tampilkan daftar data dengan pagination per 10 baris.
     */
    public function index()
    {
        $venues = Venue::paginate(10);
        return view('studycase', compact('venues'));
    }
}
