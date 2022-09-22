<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\models\User;
use \App\models\Company;
use \App\models\Listing;
use \App\models\Location;
use \App\models\Tag;
use \App\models\Industry;
use \App\models\Profile;

class AdminController extends Controller
{
    public function index(Request $request) {
        return view('admin.dashboard');
    }

    public function users(Request $request) {
        $locations = Location::listing_locations();
        $tags = Tag::get();
        $users = User::paginate(7);

        return view('admin.users', compact('users', 'locations', 'tags'));
    }

    public function companies(Request $request) {
        $companies = Company::paginate(5);
        $locations = Location::listing_locations();
        $tags = Tag::get();
        $industries = Industry::get();

        return view('admin.companies', compact('companies', 'locations', 'tags', 'industries'));
    }

    public function listings(Request $request) {
        $listings = Listing::paginate(7);
        $locations = Location::listing_locations();
        $tags = Tag::get();
        $industries = Industry::get();

        return view('admin.listings', compact('listings', 'locations', 'tags', 'industries'));
    }

    public function tags(Request $request) {
        $tags = Tag::get();

        return view('admin.tags', compact('tags'));
    }

    public function industries(Request $request) {
        $industries = Industry::get();

        return view('admin.industries', compact('industries'));
    }
}
