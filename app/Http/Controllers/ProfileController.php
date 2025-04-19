<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }
    /**
     * Menampilkan form profil.
     */
    public function create()
    {
        return view('dashboard.profile');
    }

    /**
     * Simpan profil pengguna.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'job' => 'required|string|max:255',
            'about' => 'required|string',
        ]);

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        $user->job = $request->job;
        $user->about = $request->about;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Profile created successfully.');
    }

    /**
     * Show the edit form.
     */
    public function edit()
    {
        $user = auth()->user();
        return view('dashboard.profile', compact('user'));
    }

    /**
     * Update profile data.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        // Validasi Input
        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'job' => 'required|string|max:255',
            'about' => 'required|string'
        ]);

        // Update foto profil jika ada
        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo) {
                Storage::delete($user->profile_photo);
            }

            // Simpan foto baru
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        // Update data lainnya
        $user->job = $request->job;
        $user->about = $request->about;
        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }
}
