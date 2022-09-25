<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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
        if ($request->has('q'))
        {
            $users = User::where('name', 'like', '%' . $request->q . '%')->paginate(7);
        }
        else
        {
            $users = User::paginate(7);
        }

        $locations = Location::listing_locations();
        $tags = Tag::get();

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
        $query = Listing::query()
            ->where('is_active', true)
            ->with('tags')
            ->with('company')
            ->latest();

        if ($request->has('q')) {
            $searchQuery = trim($request->get('q'));

            $query->where(function (Builder $builder) use ($searchQuery) {
                $builder
                    ->orWhere('title', 'like', "%{$searchQuery}%");
                    // ->orWhere('company', 'like', "%{$searchQuery}%")
                    // ->orWhere('location', 'like', "%{$searchQuery}%");
            });
        }

        $listings = $query->paginate(7);

        $locations = Location::listing_locations();
        $tags = Tag::get();
        $industries = Industry::get();

        return view('admin.listings', compact('listings', 'locations', 'tags', 'industries'));
    }

    public function searchUsers(Request $request)
    {
        return redirect()->route('admin.users', ['q' => $request->q]);
    }
}
