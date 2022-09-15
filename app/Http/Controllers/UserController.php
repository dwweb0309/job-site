<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        
        if ($user->is_employer())
        {
            return view('profiles.company.show', compact('user'));
        }
        else if ($user->is_candidate())
        {
            return view('profiles.user.show', compact('user'));
        }

        return 'Profile page of others';
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        return view('profiles.user.edit', compact('user'));
    }
}
