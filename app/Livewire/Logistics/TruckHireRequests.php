<?php

namespace App\Livewire\Logistics;

use App\Models\TruckHireRequest;
use Livewire\Component;
use Livewire\WithPagination;

class TruckHireRequests extends Component
{
    use WithPagination;

    public $status = 'pending';

    public function approveRequest($requestId)
    {
        $request = TruckHireRequest::findOrFail($requestId);
        $request->update(['status' => 'approved']);
        session()->flash('approved', 'Hire request approved.');
    }

    public function render()
    {
        $query = TruckHireRequest::with(['customer', 'truck'])
            ->orderBy('created_at', 'desc');

        if ($this->status) {
            $query->where('status', $this->status);
        }

        return view('livewire.logistics.truck-hire-requests', [
            'requests' => $query->paginate(15),
        ])->layout('layouts.app', ['header' => 'Truck Hire Requests']);
    }
}
