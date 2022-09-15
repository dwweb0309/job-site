<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Company;
use App\Models\Location;
use App\Models\Industry;
use App\Models\Tag;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        return view('company.dashboard');
    }

    public function show(Request $request, $id)
    {
        $company = Company::find($id);
        
        return view('company.show', compact('company'));
    }

    public function listings(Request $request)
    {
        $listings = $request->user()->company->listings;

        return view('company.listings', compact('listings'));
    }

    public function edit(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $locations = Location::get()->where('hiring_destination', true);
        $industries = Industry::get();

        return view('company.edit', compact('company', 'locations', 'industries'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $validationArray = [
            'name' => 'required'
        ];

        $company->update([
            'name' => $request->name,
            'website' => $request->website,
            'location_id' => $request->location_id,
            'description' => $request->description
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

        $company->tags()->sync($tag_ids);
        
        Session::flash('message', 'Successfully Updated!'); 
        
        return redirect()->route('company.show', $company->id);
    }
}
