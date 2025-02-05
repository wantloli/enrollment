<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function showLogs()
    {
        $logFile = storage_path('logs/laravel.log'); // Path to your Laravel log file

        if (File::exists($logFile)) {
            $logs = File::get($logFile);
        } else {
            $logs = 'No log file found.';
        }

        return view('settings.logs', compact('logs'));
    }

    public function showDeletedLogs()
    {
        $logFile = storage_path('logs/deleted.log');

        if (File::exists($logFile)) {
            $logs = File::get($logFile);
        } else {
            $logs = 'No deleted logs found.';
        }

        return view('settings.deleted-logs', compact('logs'));
    }

    public function clearDeletedLogs()
    {
        $logFile = storage_path('logs/deleted.log');

        if (File::exists($logFile)) {
            File::put($logFile, '');
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
