<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email = '';
    public $contrasenia = '';

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'contrasenia' => 'required|min:5',
        ]);

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->contrasenia])) {
            session()->flash('error', 'Credenciales incorrectas');
            return;
        }

        session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.login');
    }
}