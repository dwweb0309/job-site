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

        return view('user.show', compact('user'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }
}
