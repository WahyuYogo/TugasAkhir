<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ClaimUrl extends Component
{
    public $slug;
    public $slugAvailable = null;

    public function updatedSlug()
    {
        $this->slug = Str::slug($this->slug);
        $this->checkSlugAvailability();
    }

    public function checkSlugAvailability()
    {
        if (!$this->slug) {
            $this->slugAvailable = null;
            return;
        }

        $exists = User::where('slug', $this->slug)->exists();
        $this->slugAvailable = !$exists;
    }

    public function claim()
    {
        $this->validate([
            'slug' => [
                'required',
                'string',
                'alpha_dash',
                'min:3',
                'max:30',
                Rule::unique('users', 'slug')->ignore(Auth::id()),
            ]
        ]);

        $user = Auth::user();
        $user->slug = $this->slug;
        $user->save();
        return redirect()->to('/dashboard');
    }

    public function mount()
    {
        if (Auth::user()->slug) {
            return redirect()->route('dashboard')->with('error', 'You have already claimed a URL.');
        }
    }

    public function render()
    {
        return view('livewire.claim-url');
    }
}
