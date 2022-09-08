<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request) {
        return view('company.dashboard');
    }

    public function listings(Request $request) {
        $listings = $request->user()->company->listings;

        return view('company.listings', compact('listings'));
    }
}
