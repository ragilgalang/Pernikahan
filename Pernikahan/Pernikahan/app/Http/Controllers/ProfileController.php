<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username,' . $user->id,
            'gender' => 'nullable|in:Pria,Wanita,Lainnya',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = $request->only(['first_name', 'last_name', 'username', 'gender']);

        // Update fullname 'name' field based on first and last name
        if ($request->filled('first_name') || $request->filled('last_name')) {
            $data['name'] = trim(($request->first_name ?? '') . ' ' . ($request->last_name ?? ''));
        }

        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        $user->update($data);

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}
