<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{

    public $name, $email, $password, $password_confirmation;

    protected $rules = [
        'name'                  => 'required|min:3',
        'email'                 => 'required|email|unique:users,email',
        'password'              => 'required|min:6|confirmed',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);

        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
