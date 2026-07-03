<?php

namespace App\Livewire\Branches;

use App\Models\Branch;
use App\Services\BranchService;
use Livewire\Component;
use Livewire\WithPagination;

class BranchList extends Component
{
    use WithPagination;

    public $showModal = false;
    public $name, $code, $city, $address, $phone, $email;
    public $editingBranchId = null;

    public function create()
    {
        $this->reset(['name', 'code', 'city', 'address', 'phone', 'email', 'editingBranchId']);
        $this->showModal = true;
    }

    public function save(BranchService $service)
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:branches,code,' . $this->editingBranchId,
        ]);

        $data = [
            'name' => $this->name,
            'code' => $this->code,
            'city' => $this->city,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
        ];

        if ($this->editingBranchId) {
            $service->updateBranch($this->editingBranchId, $data);
        } else {
            $service->createBranch($data);
        }

        $this->showModal = false;
        $this->dispatch('notify', 'Branch saved successfully.');
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        $this->editingBranchId = $id;
        $this->name = $branch->name;
        $this->code = $branch->code;
        $this->city = $branch->city;
        $this->address = $branch->address;
        $this->phone = $branch->phone;
        $this->email = $branch->email;
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.branches.branch-list', [
            'branches' => Branch::paginate(10),
        ])->layout('layouts.app', ['header' => 'Manage Branches']);
    }
}
