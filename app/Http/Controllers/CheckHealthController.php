<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckHealthController extends Controller
{
    public function index()
    {
        try {
            return response('Health is Okay !', 200)
                ->header('Content-Type', 'application/json');
        } catch (\Throwable $th) {
            //throw $th;
            return response($th, 500)
                ->header('Content-Type', 'application/json');
        }
    }
}