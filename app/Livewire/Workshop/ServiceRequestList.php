<?php

namespace App\Livewire\Workshop;

use App\Models\ServiceRequest;
use App\Services\Workshop\JobService;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceRequestList extends Component
{
    use WithPagination;

    public $status = 'new';

    public function convertToJob($requestId)
    {
        $request = ServiceRequest::findOrFail($requestId);

        $service = app(JobService::class);
        $job = $service->convertRequestToJob($request);

        session()->flash('converted', 'Request converted to Job: ' . $job->job_number);
        return redirect()->route('jobs.show', $job);
    }

    public function declineRequest($requestId)
    {
        $request = ServiceRequest::findOrFail($requestId);
        $request->update(['status' => 'declined']);
        session()->flash('declined', 'Service request has been declined.');
    }

    public function render()
    {
        $query = ServiceRequest::with(['customer', 'equipment', 'service'])
            ->orderBy('created_at', 'desc');

        if ($this->status) {
            $query->where('status', $this->status);
        }

        return view('livewire.workshop.service-request-list', [
            'requests' => $query->paginate(15),
        ])->layout('layouts.app', ['header' => 'Service Requests']);
    }
}
