<?php

namespace App\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';
    /** @var string */
    public $Bagian = '';

    /** @var string */
    public $passwordConfirmation = '';

    public function register()
    {
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'Bagian' => 'required',
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);
        $fullName = $this->name . ' ' . $this->Bagian;
        $user = User::create([
            'email' => $this->email,
            'name' => $fullName,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended('/chats');
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
