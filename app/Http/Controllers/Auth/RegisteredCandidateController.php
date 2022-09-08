<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use App\Models\Location;
use App\Models\CurrencyCode;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredCandidateController extends Controller
{
    /**
     * Display the registration view first step.
     *
     * @return \Illuminate\View\View
     */
    public function first(Request $request)
    {
        return view('auth.candidate.register-first');
    }

    /**
     * Display the registration view profile step.
     *
     * @return \Illuminate\View\View
     */
    public function second(Request $request)
    {
        $locations = Location::get()->where('hiring_source', true);
        $currency_codes = CurrencyCode::get();

        return view('auth.candidate.register-second', compact('locations', 'currency_codes'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store_first(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User();
        $user->fill($validatedData);

        $request->session()->put('candidate', $user);

        return redirect()->route('register.candidate.second');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store_second(Request $request)
    {
        $validatedData = $request->validate([
            'linkedin_url' => ['required', 'string', 'max:255'],
            'whatsapp' => ['required', 'string', 'max:255'],
            'photo_url' => ['required', 'image'],
            'location_id' => ['required'],
            'currency_code' => ['required', 'string']
        ]);

        $user_session = $request->session()->get('candidate');

        $user = User::create([
            'name' => $user_session->name,
            'email' => $user_session->email,
            'role_id' => 2,
            'password' => Hash::make($user_session->password)
        ]);

        $fileName = time().'_'.$request->photo_url->getClientOriginalName();
        $filePath = $request->file('photo_url')->storeAs('uploads', $fileName, 'public');

        $user->profile()->create([
            'linkedin_url' => $request->linkedin_url,
            'whatsapp' => $request->whatsapp,
            'photo_url' => '/storage/' . $filePath,
            'location_id' => $request->location_id,
            'nationality' => $request->location_id,
            'gender' => $request->gender,
            'currency_code' => $request->currency_code,
            'description' => $request->description
        ]);

        $listing_slug = $request->session()->get('listing_slug');

        $user->listings()->attach($listing_slug['id']);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('listings.show', ['listing' => $listing_slug['slug'], 'success' => true]);
    }
}
