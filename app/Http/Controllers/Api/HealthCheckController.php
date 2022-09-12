<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class HealthCheckController extends Controller
{
    public function index()
    {
        try {
            return "Okay";
        } catch (\Throwable $th) {
            return $th;
        }
    }
}