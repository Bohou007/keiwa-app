<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckHealthController extends Controller
{
    public function index()
    {
        return view('session/login');
    }
}