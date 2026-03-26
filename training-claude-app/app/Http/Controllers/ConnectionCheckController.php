<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConnectionCheckController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            DB::connection()->getPdo();
            $dbConnectionStatus = true;
        } catch (Exception $e) {
            $dbConnectionStatus = false;
        }

        return view('connection-check', [
            'db' => $dbConnectionStatus
        ]);
    }
}
