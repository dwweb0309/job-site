<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
use App\Models\Location;
use App\Models\CurrencyCode;
use App\Models\Industry;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredEmployerController extends Controller
{
    /**
     * Display the registration view first step.
     *
     * @return \Illuminate\View\View
     */
    public function first(Request $request)
    {
        return view('auth.employer.register-first');
    }

    /**
     * Display the registration view profile step.
     *
     * @return \Illuminate\View\View
     */
    public function second(Request $request)
    {
        $locations = Location::get()->where('hiring_destination', true);
        $industries = Industry::get();

        return view('auth.employer.register-second', compact('locations', 'industries'));
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

        $request->session()->put('employer', $user);

        return redirect()->route('register.employer.second');
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
            'name' => ['required', 'string', 'max:255'],
            'website' => ['required', 'string', 'max:255'],
            'logo' => ['required', 'image'],
            'location_id' => ['required']
        ]);

        $user_session = $request->session()->get('employer');

        $user = User::create([
            'name' => $user_session->name,
            'email' => $user_session->email,
            'role_id' => Role::EMPLOYER,
            'password' => Hash::make($user_session->password)
        ]);

        $fileName = time().'_'.$request->logo->getClientOriginalName();
        $filePath = $request->file('logo')->storeAs('uploads', $fileName, 'public');

        $user->company()->create([
            'website' => $request->website,
            'logo' => '/storage/' . $filePath,
            'name' => $request->name,
            'location_id' => $request->location_id,
            'description' => $request->description,
            'credits' => 0
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('listings.create');
    }
}
