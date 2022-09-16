<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Location;
use App\Models\CurrencyCode;
use App\Models\Tag;

class UserController extends Controller
{
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        
        return view('profiles.user.show', compact('user'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $locations = Location::get();
        $currency_codes = CurrencyCode::get();

        $date = date_create($user->profile->dob);
        $dob = date_format($date,"Y-m-d");
        $user->profile->dob = $dob;

        return view('profiles.user.edit', compact('user', 'locations', 'currency_codes'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validationArray = [
            'name' => 'required',
            'location_id' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'expected_salary' => 'required|number'
        ];

        $user->update([
            'name' => $request->name
        ]);

        $user->profile()->update([
            'location_id' => $request->location_id,
            'linkedin_url' => $request->linkedin_url,
            'whatsapp' => $request->whatsapp,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'expected_salary' => $request->expected_salary,
            'currency_code' => $request->currency_code,
            'description' => $request->description,
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

        $user->profile->tags()->sync($tag_ids);
        
        Session::flash('message', 'Successfully Updated!');
        
        return redirect()->route('user.show', $user->id);
    }
}
