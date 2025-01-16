<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class DatabaseController extends Controller
{

    public function migrateDatabase(Request $request)
    {
        if (!Auth::user()->role === 'admin') {
            abort(403, 'Unauthorized action.');
        }

        Artisan::call('migrate');

        return redirect()->route('home.index')->with('status', 'Database has been deleted and migrations have been reset.');
    }

    public function deleteDatabase(Request $request)
    {
        if (!Auth::user()->role === 'admin') {
            abort(403, 'Unauthorized action.');
        }

        Artisan::call('migrate:fresh');

        return redirect()->route('home.index')->with('status', 'Database has been deleted and migrations have been reset.');
    }
}
