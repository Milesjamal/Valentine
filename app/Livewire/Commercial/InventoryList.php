<?php

namespace App\Livewire\Commercial;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryList extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';

    public function render()
    {
        $query = Product::with('supplier');

        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('sku', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->category) {
            $query->where('category', $this->category);
        }

        return view('livewire.commercial.inventory-list', [
            'products' => $query->orderBy('name')->paginate(20),
            'categories' => Product::distinct()->pluck('category')->filter(),
        ])->layout('layouts.app', ['header' => 'Inventory Management']);
    }
}
