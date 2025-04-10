<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Container\Attributes\Storage;
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
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // $this->authorize('update', $project);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'nullable|string',
        ]);

        $imagePath = $project->image;
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $project->update([
            'title' => $request->title,
            'image' => $imagePath,
            'description' => $request->description
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
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
