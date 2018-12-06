<?php

namespace App\Http\Controllers;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        return view('home');
    }
}
