<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index()
    {
        $metaTitle = "Dummy Meta Title - Counter Page";
        return view('counter', compact('metaTitle'));
    }
}
