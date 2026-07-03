<?php

namespace App\Livewire\Workshop;

use App\Models\WorkshopJob;
use App\Models\Mechanic;
use App\Services\Workshop\JobService;
use Livewire\Component;
use Livewire\WithFileUploads;

class JobDetail extends Component
{
    use WithFileUploads;

    public WorkshopJob $job;
    public $newNote = '';
    public $isPublicNote = false;
    public $newStatus = '';
    public $assignedMechanicId = '';

    protected $rules = [
        'newNote' => 'required|string|min:3',
        'newStatus' => 'required|string',
    ];

    public function mount(WorkshopJob $job)
    {
        $this->job = $job->load(['customer', 'equipment', 'mechanic.user', 'notes.author', 'statusHistory.user']);
        $this->newStatus = $job->status;
        $this->assignedMechanicId = $job->assigned_mechanic_id;
    }

    public function addNote()
    {
        $this->validate(['newNote' => 'required|string|min:3']);

        $this->job->notes()->create([
            'author_id' => auth()->id(),
            'note' => $this->newNote,
            'is_customer_visible' => $this->isPublicNote,
        ]);

        $this->newNote = '';
        $this->isPublicNote = false;
        $this->job->load('notes.author');

        session()->flash('note_added', 'Note added successfully.');
    }

    public function updateStatus()
    {
        if ($this->newStatus === $this->job->status) return;

        $service = app(JobService::class);
        $service->transitionStatus($this->job, $this->newStatus);

        $this->job->refresh();
        session()->flash('status_updated', 'Job status updated to ' . str_replace('_', ' ', $this->newStatus));
    }

    public function assignMechanic()
    {
        $this->job->update(['assigned_mechanic_id' => $this->assignedMechanicId]);
        $this->job->refresh();
        session()->flash('mechanic_assigned', 'Mechanic assigned successfully.');
    }

    public function render()
    {
        return view('livewire.workshop.job-detail', [
            'mechanics' => Mechanic::with('user')->get(),
            'availableStatuses' => \App\Enums\JobStatus::cases(),
        ])->layout('layouts.app', ['header' => 'Job Detail: ' . $this->job->job_number]);
    }
}
