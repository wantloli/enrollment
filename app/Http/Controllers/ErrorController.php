<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function forbidden()
    {
        return response()->view('errors.403', [], 403);
    }
}
