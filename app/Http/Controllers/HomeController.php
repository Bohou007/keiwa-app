<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return redirect('forms-listes');
    }

    public function form()
    {
        return redirect('form');
    }
}