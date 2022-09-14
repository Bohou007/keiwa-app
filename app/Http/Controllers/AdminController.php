<?php

namespace App\Http\Controllers;

use App\Models\Forms;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $forms = Forms::paginate(7);
        return view('tables', compact('forms'));
    }
}