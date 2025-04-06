<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialLinks = auth()->user()->socialLinks;
        return view('dashboard.links', compact('socialLinks'));
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
        $request->validate([
            'platform' => 'required',
            'url' => 'required|url'
        ]);
        auth()->user()->socialLinks()->create([
            'platform' => $request->platform,
            'url' => $request->url
        ]);
        return back()->with('success', 'Social link added successfully.');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return back()->with('success', 'Social link deleted successfully.');
    }
}
