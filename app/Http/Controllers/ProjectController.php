<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = auth()->user()->projects;
        return view('dashboard.projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->projects()->count() >= 6) {
            return redirect()->back()->withErrors(['error' => 'Anda hanya bisa memiliki maksimal 6 project.']);
        }

        // Validasi input
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Maksimal 2MB
        ], [
            'image.required' => 'Gambar wajib diunggah.',
            'image.image'    => 'File harus berupa gambar.',
            'image.mimes'    => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'image.max'      => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        // Simpan gambar ke storage
        $imagePath = $request->file('image')->store('projects', 'public');

        // Simpan project baru
        $user->projects()->create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Project berhasil ditambahkan!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        if (auth()->id() !== $project->user_id) {
            abort(403);
        }

        return view('dashboard.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        if (auth()->id() !== $project->user_id) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->only(['title', 'description', 'link']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }

            // Upload gambar baru
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('dashboard')->with('success', 'Project berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with('success', 'Project deleted successfully.');
    }
}
