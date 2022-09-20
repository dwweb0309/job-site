<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\Company;
use App\Models\Location;
use App\Models\Industry;
use App\Models\Tag;

class CompanyController extends Controller
{
    public function dashboard(Request $request)
    {
        $company = Auth::user()->company;

        return view('company.show', compact('company'));
    }

    public function listings(Request $request)
    {
        $listings = $request->user()->company->listings;

        return view('company.listings', compact('listings'));
    }

    public function edit(Request $request)
    {
        $company = Auth::user()->company;
        $locations = Location::get()->where('hiring_destination', true);
        $industries = Industry::get();

        return view('company.edit', compact('company', 'locations', 'industries'));
    }

    public function update(Request $request)
    {
        $company = Auth::user()->company;

        $validationArray = [
            'name' => 'required',
            'location_id' => 'required',
            'website' => 'required',
            'logo' => 'sometimes|file|mimes:jpeg,jpg,png'
        ];

        $data = [
            'name' => $request->name,
            'website' => $request->website,
            'location_id' => $request->location_id,
            'description' => $request->description,
        ];

        if ($request->exists('logo')) {
            $fileName = time().'_'.$request->logo->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads', $fileName, 'public');

            $data = array_merge($data, [
                'logo' => '/storage/' . $filePath
            ]);

            Storage::delete($company->logo);
        }

        $company->update($data);

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
        
        return redirect()->route('company.dashboard');
    }
}
