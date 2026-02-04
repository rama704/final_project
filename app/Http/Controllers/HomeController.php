<?php

namespace App\Http\Controllers;
use App\Models\Doctor;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $doctors = Doctor::inRandomOrder()->take(4)->get();

    return view('index', compact('doctors'));
}
}
