<?php

namespace App\Livewire\Commercial;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class InvoiceList extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';

    public function render()
    {
        $query = Invoice::with(['customer', 'job']);

        if ($this->search) {
            $query->where(function($q) {
                $q->where('invoice_number', 'like', '%' . $this->search . '%')
                  ->orWhereHas('customer', fn($q) => $q->where('company_name', 'like', '%' . $this->search . '%')->orWhere('contact_name', 'like', '%' . $this->search . '%'));
            });
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        return view('livewire.commercial.invoice-list', [
            'invoices' => $query->orderBy('created_at', 'desc')->paginate(15),
        ])->layout('layouts.app', ['header' => 'Invoices & Billing']);
    }
}
