<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Location;
use App\Models\CurrencyCode;
use App\Models\Tag;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        
        return view('profiles.user.show', compact('user'));
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $locations = Location::get();
        $currency_codes = CurrencyCode::get();

        $date = date_create($user->profile->dob);
        $dob = date_format($date,"Y-m-d");
        $user->profile->dob = $dob;

        return view('profiles.user.edit', compact('user', 'locations', 'currency_codes'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validationArray = [
            'name' => 'required',
            'location_id' => 'required',
            'nationality_id' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'logo' => 'sometimes|file|mimes:jpeg,jpg,png',
            'expected_salary' => 'required|number'
        ];

        $user->update([
            'name' => $request->name
        ]);

        $data = [
            'location_id' => $request->location_id,
            'nationality_id' => $request->nationality_id,
            'linkedin_url' => $request->linkedin_url,
            'whatsapp' => $request->whatsapp,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'expected_salary' => $request->expected_salary,
            'currency_code' => $request->currency_code,
            'description' => $request->description,
        ];

        if ($request->exists('photo_url')) {
            $fileName = time().'_'.$request->photo_url->getClientOriginalName();
            $filePath = $request->file('photo_url')->storeAs('uploads', $fileName, 'public');

            $data = array_merge($data, [
                'photo_url' => '/storage/' . $filePath
            ]);

            Storage::delete($user->profile->photo_url);
        }

        $user->profile()->update($data);

        $tag_ids = [];

        foreach(explode(',', $request->tags) as $requestTag) {
            $tag = Tag::firstOrCreate([
                'slug' => Str::slug(trim($requestTag))
            ], [
                'name' => ucwords(trim($requestTag))
            ]);

            array_push($tag_ids, $tag->id);
        }

        $user->profile->tags()->sync($tag_ids);
        
        Session::flash('message', 'Successfully Updated!');
        
        return redirect()->route('user.show');
    }
}
