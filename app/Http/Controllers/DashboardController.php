<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        if ($request->user()->company && $request->user()->company->listings) {
            return view('dashboard', [
                'listings' => $request->user()->company->listings
            ]);
        } else {
            return view('dashboard', [
                'listings' => collect([])
            ]);
        }
    }
}
