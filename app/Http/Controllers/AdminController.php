<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\models\User;
use \App\models\Company;
use \App\models\Listing;

class AdminController extends Controller
{
    public function index(Request $request) {
        return view('admin.dashboard');
    }

    public function users(Request $request) {
        $users = User::get();

        return view('admin.users', compact('users'));
    }

    public function companies(Request $request) {
        $companies = Company::get();

        return view('admin.companies', compact('companies'));
    }

    public function listings(Request $request) {
        $listings = Listing::get();

        return view('admin.listings', compact('listings'));
    }
}
