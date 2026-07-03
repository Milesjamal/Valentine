<?php

namespace App\Livewire\Workshop;

use App\Models\WorkshopJob;
use Livewire\Component;
use Livewire\WithPagination;

class JobList extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';

    protected $queryString = ['search', 'status'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = WorkshopJob::with(['customer', 'equipment', 'mechanic.user']);

        if ($this->search) {
            $query->where(function($q) {
                $q->where('job_number', 'like', '%' . $this->search . '%')
                  ->orWhereHas('customer', fn($q) => $q->where('company_name', 'like', '%' . $this->search . '%')->orWhere('contact_name', 'like', '%' . $this->search . '%'))
                  ->orWhereHas('equipment', fn($q) => $q->where('equipment_name', 'like', '%' . $this->search . '%'));
            });
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        return view('livewire.workshop.job-list', [
            'jobs' => $query->orderBy('created_at', 'desc')->paginate(15),
            'statuses' => \App\Enums\JobStatus::cases(),
        ])->layout('layouts.app', ['header' => 'Workshop Jobs']);
    }
}
