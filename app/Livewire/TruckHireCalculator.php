<?php

namespace App\Livewire;

use Livewire\Component;

class TruckHireCalculator extends Component
{
    public $days = 1;
    public $baseRate = 250;
    public $total = 0;

    public function mount()
    {
        $this->calculate();
    }

    public function calculate()
    {
        $this->total = $this->days * $this->baseRate;
    }

    public function updatedDays()
    {
        $this->calculate();
    }

    public function render()
    {
        return view('livewire.truck-hire-calculator');
    }
}
