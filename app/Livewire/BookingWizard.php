<?php

namespace App\Livewire;

use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Customer;
use Livewire\Component;

class BookingWizard extends Component
{
    public $step = 1;
    public $services;

    // Form fields
    public $name, $company, $phone, $email;
    public $selectedService, $description, $preferredDate;

    public function mount()
    {
        $this->services = Service::where('is_active', true)->get();
    }

    public function nextStep()
    {
        if ($this->step === 1) {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
            ]);
        }
        $this->step++;
    }

    public function submit()
    {
        $this->validate([
            'selectedService' => 'required',
            'description' => 'required|min:10',
        ]);

        // Logic to create customer and request
        // For now just simulate success

        $this->step = 3;
    }

    public function render()
    {
        return view('livewire.booking-wizard');
    }
}
