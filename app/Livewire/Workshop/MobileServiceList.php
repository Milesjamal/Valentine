<?php

namespace App\Livewire\Workshop;

use App\Models\MobileServiceRequest;
use Livewire\Component;
use Livewire\WithPagination;

class MobileServiceList extends Component
{
    use WithPagination;

    public $status = 'pending';

    public function render()
    {
        $query = MobileServiceRequest::with(['customer', 'equipment', 'assignedMechanic.user'])
            ->orderBy('created_at', 'desc');

        if ($this->status) {
            $query->where('status', $this->status);
        }

        return view('livewire.workshop.mobile-service-list', [
            'requests' => $query->paginate(15),
        ])->layout('layouts.app', ['header' => 'Mobile Workshop / Field Service']);
    }
}
