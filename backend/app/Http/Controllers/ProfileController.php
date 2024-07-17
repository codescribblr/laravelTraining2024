<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        $users = User::all();
        return view('profiles.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        Profile::create($validated);

        return redirect()->route('profiles.index');
    }

    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        $users = User::all();
        return view('profiles.edit', compact('profile', 'users'));
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $profile->update($validated);

        return redirect()->route('profiles.index');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index');
    }
}
