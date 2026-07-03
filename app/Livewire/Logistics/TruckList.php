<?php

namespace App\Livewire\Logistics;

use App\Models\Truck;
use Livewire\Component;

class TruckList extends Component
{
    public function render()
    {
        return view('livewire.logistics.truck-list', [
            'trucks' => Truck::all(),
        ])->layout('layouts.app', ['header' => 'Nissan UD 80 Fleet']);
    }
}
