<?php

namespace App\Livewire\Equipment;

use App\Models\Equipment;
use Livewire\Component;
use Livewire\WithPagination;

class EquipmentList extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = Equipment::with('customer');

        if (auth()->user()->hasRole('Customer')) {
            $query->where('customer_id', auth()->user()->customer->id);
        }

        if ($this->search) {
            $query->where(function($q) {
                $q->where('equipment_name', 'like', '%' . $this->search . '%')
                  ->orWhere('serial_number', 'like', '%' . $this->search . '%')
                  ->orWhere('model', 'like', '%' . $this->search . '%');
            });
        }

        return view('livewire.equipment.equipment-list', [
            'equipments' => $query->orderBy('equipment_name')->paginate(15),
        ])->layout('layouts.app', ['header' => 'Equipment Registry']);
    }
}
