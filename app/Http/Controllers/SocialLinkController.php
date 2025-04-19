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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->socialLinks()->count() >= 6) {
            return redirect()->back()->withErrors(['error' => 'Anda hanya bisa memiliki maksimal 6 link.']);
        }

        $request->validate([
            'url' => 'required|string',
            'username' => 'required|string'
        ]);

        // Deteksi platform dan username berdasarkan URL
        $platform = $this->detectPlatform($request->url);

        auth()->user()->socialLinks()->create([
            'platform' => $platform,
            'url' => $request->url,
            'username' =>  $request->username
        ]);

        return back()->with('success', 'Social link added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialLink $Link)
    {
        return view('dashboard.edit-link', compact('Link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialLink $Link)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $Link->update([
            'url' => $request->url
        ]);

        return redirect()->route('links.index')->with('success', 'Social link updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialLink $Link)
    {
        $Link->delete();
        return back()->with('success', 'Social link deleted successfully.');
    }


    /**
     * Fungsi untuk mendeteksi platform sosial media berdasarkan URL.
     */
    private function detectPlatform($url)
    {
        $platforms = [
            'Facebook' => ['facebook.com'],
            'Twitter' => ['twitter.com', 'x.com'],
            'Instagram' => ['instagram.com'],
            'Linkedin' => ['linkedin.com'],
            'Youtube' => ['youtube.com', 'youtu.be'],
            'Github' => ['github.com'],
            'Tiktok' => ['tiktok.com'],
        ];

        foreach ($platforms as $name => $domains) {
            foreach ($domains as $domain) {
                if (stripos($url, $domain) !== false) {
                    return $name;
                }
            }
        }

        return 'Other'; // Default jika platform tidak ditemukan
    }

    /**
     * Fungsi untuk mengambil username dari URL sosial media.
     */
    private function extractUsername($url, $platform)
    {
        $patterns = [
            'Facebook' => '/facebook\.com\/([^\/?]+)/',
            'Twitter' => '/x\.com\/([^\/?]+)/',
            'Instagram' => '/instagram\.com\/([^\/?]+)/',
            'Linkedin' => '/linkedin\.com\/in\/([^\/?]+)/',
            'Youtube' => '/youtube\.com\/(channel|user)\/([^\/?]+)/',
            'Github' => '/github\.com\/([^\/?]+)/',
            'Tiktok' => '/tiktok\.com\/@([^\/?]+)/',
        ];

        if (isset($patterns[$platform])) {
            if (preg_match($patterns[$platform], $url, $matches)) {
                return end($matches);
            }
        }

        return 'Unknown';
    }
}
