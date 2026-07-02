<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TwoFactorSetup extends Component
{
    public function enableTwoFactor()
    {
        // Fortify's action logic normally handles this, but we can trigger it
        $user = Auth::user();

        // This is a simplified placeholder for the 2FA setup flow
        // In a real app, we'd use Fortify's actions or show the QR code

        return redirect()->to('/user/two-factor-authentication');
    }

    public function render()
    {
        return view('livewire.auth.two-factor-setup')
            ->layout('layouts.app', ['header' => 'Security Setup']);
    }
}
