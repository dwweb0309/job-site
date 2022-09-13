<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use ParsedownExtra;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\Listing;
use App\Models\CurrencyCode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $query = Listing::query()
            ->where('is_active', true)
            ->with('tags')
            ->with('company')
            ->latest();

        if ($request->has('s')) {
            $searchQuery = trim($request->get('s'));

            $query->where(function (Builder $builder) use ($searchQuery) {
                $builder
                    ->orWhere('title', 'like', "%{$searchQuery}%")
                    ->orWhere('company', 'like', "%{$searchQuery}%")
                    ->orWhere('location', 'like', "%{$searchQuery}%");
            });
        }

        if ($request->has('tag')) {
            $tag = $request->get('tag');
            $query->whereHas('tags', function (Builder $builder) use ($tag) {
                $builder->where('slug', $tag);
            });
        }

        $listings = $query->get();

        $tags = Tag::orderBy('name')
            ->get();

        return view('listings.index', compact('listings', 'tags'));
    }

    public function show(Listing $listing, Request $request)
    {
        return view('listings.show', compact('listing'));
    }

    public function apply(Listing $listing, Request $request)
    {
        $listing->clicks()
            ->create([
                'user_agent' => $request->userAgent(),
                'ip' => $request->ip()
            ]);
        
        if (Auth::check()) {
            if ($listing->apply_url) {
                return redirect()->to($listing->apply_url);
            }

            return redirect()->route('listings.show', ['listing' => $listing->slug, 'success' => true]);
        } else {
            $request->session()->put('listing_slug', ['slug' => $listing->slug, 'id' => $listing->id]);

            return redirect()->route('register.candidate.first');
        }
    }

    public function create()
    {
        if (Auth::check() && (Auth::user()->is_employer() || Auth::user()->is_admin()))
        {
            $currency_codes = CurrencyCode::get();

            return view('listings.create', compact('currency_codes'));
        }

        return redirect()->route('register.employer.first');
    }

    public function edit(Listing $listing)
    {
        if ($listing->is_editable())
        {
            $currency_codes = CurrencyCode::get();

            return view('listings.edit', compact('currency_codes', 'listing'));
        }

        Auth::logout();
        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        // process the listing creation form
        $validationArray = [
            'title' => 'required',
            'content' => 'required',
            'age_min' => 'required|number',
            'age_max' => 'required|number',
            'salary_max' => 'required|number',
            'salary_max' => 'required|number',
            // 'payment_method_id' => 'required'
        ];

        $listing = Auth::user()->company->listings()
            ->create([
                'title' => $request->title,
                'slug' => Str::slug($request->title) . '-' . rand(1111, 9999),
                'apply_link' => $request->apply_link,
                'content' => $request->content,
                'age_min' => $request->age_min,
                'age_max' => $request->age_max,
                'salary_min' => $request->salary_min,
                'salary_max' => $request->salary_max,
                'currency_code' => $request->currency_code,
                'remote_allowed' => $request->has('remote_allowed') ?? false,
                'hybrid_allowed' => $request->has('hybrid_allowed') ?? false,
                'inperson_allowed' => $request->has('inperson_allowed') ?? false,
                'is_highlighted' => $request->filled('is_highlighted'),
                'is_active' => true
            ]);

        foreach(explode(',', $request->tags) as $requestTag) {
            $tag = Tag::firstOrCreate([
                'slug' => Str::slug(trim($requestTag))
            ], [
                'name' => ucwords(trim($requestTag))
            ]);

            $tag->listings()->attach($listing->id);
        }

        Session::flash('message', 'Successfully Created!'); 

        return redirect()->route('listings.index');

        // process the payment and create the listing
        // try {
        //     $amount = 9900; // $99.00 USD in cents
        //     if ($request->filled('is_highlighted')) {
        //         $amount += 1900;
        //     }

        //     $user->charge($amount, $request->payment_method_id);

        //     $md = new \ParsedownExtra();

        //     $listing = $user->company()->listings()
        //         ->create([
        //             'title' => $request->title,
        //             'slug' => Str::slug($request->title) . '-' . rand(1111, 9999),
        //             'company' => $request->company,
        //             'logo' => basename($request->file('logo')->store('public')),
        //             'location' => $request->location,
        //             'apply_link' => $request->apply_link,
        //             'content' => $md->text($request->input('content')),
        //             'is_highlighted' => $request->filled('is_highlighted'),
        //             'is_active' => true
        //         ]);

        //     foreach(explode(',', $request->tags) as $requestTag) {
        //         $tag = Tag::firstOrCreate([
        //             'slug' => Str::slug(trim($requestTag))
        //         ], [
        //             'name' => ucwords(trim($requestTag))
        //         ]);

        //         $tag->listings()->attach($listing->id);
        //     }

        //     return redirect()->route('dashboard');
        // } catch(\Exception $e) {
        //     return redirect()->back()
        //         ->withErrors(['error' => $e->getMessage()]);
        // }
    }

    public function update(Request $request, Listing $listing)
    {
        $validationArray = [
            'title' => 'required',
            'content' => 'required',
            'age_min' => 'required|number',
            'age_max' => 'required|number',
            'salary_max' => 'required|number',
            'salary_max' => 'required|number'
        ];
        if ($listing->is_editable())
        {
            $listing->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title) . '-' . rand(1111, 9999),
                'apply_link' => $request->apply_link,
                'content' => $request->content,
                'age_min' => $request->age_min,
                'age_max' => $request->age_max,
                'salary_min' => $request->salary_min,
                'salary_max' => $request->salary_max,
                'currency_code' => $request->currency_code,
                'remote_allowed' => $request->has('remote_allowed') ?? false,
                'hybrid_allowed' => $request->has('hybrid_allowed') ?? false,
                'inperson_allowed' => $request->has('inperson_allowed') ?? false,
                'is_highlighted' => $request->filled('is_highlighted')
            ]);
    
            $tag_ids = [];

            foreach(explode(',', $request->tags) as $requestTag) {
                $tag = Tag::firstOrCreate([
                    'slug' => Str::slug(trim($requestTag))
                ], [
                    'name' => ucwords(trim($requestTag))
                ]);

                array_push($tag_ids, $tag->id);
            }

            $listing->tags()->sync($tag_ids);
            
            Session::flash('message', 'Successfully Updated!'); 
            
            return redirect()->route('listings.index');
        } else {
            Auth::logout();
            return redirect()->route('login');
        }
    }
}