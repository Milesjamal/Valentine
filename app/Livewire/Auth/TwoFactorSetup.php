<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TwoFactorSetup extends Component
{
    public function render()
    {
        return view('livewire.auth.two-factor-setup')
            ->layout('layouts.app', ['header' => 'Security Setup']);
    }
}
