<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use App\Services\CustomerService;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerList extends Component
{
    use WithPagination;

    public $showModal = false;
    public $contact_name, $company_name, $email, $phone, $tax_number, $physical_address;
    public $editingCustomerId = null;

    public function create()
    {
        $this->reset(['contact_name', 'company_name', 'email', 'phone', 'tax_number', 'physical_address', 'editingCustomerId']);
        $this->showModal = true;
    }

    public function save(CustomerService $service)
    {
        $this->validate([
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $data = [
            'contact_name' => $this->contact_name,
            'company_name' => $this->company_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'tax_number' => $this->tax_number,
            'physical_address' => $this->physical_address,
        ];

        if ($this->editingCustomerId) {
            $service->updateCustomer($this->editingCustomerId, $data);
        } else {
            $service->createCustomer($data);
        }

        $this->showModal = false;
        $this->dispatch('notify', 'Customer saved successfully.');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $this->editingCustomerId = $id;
        $this->contact_name = $customer->contact_name;
        $this->company_name = $customer->company_name;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
        $this->tax_number = $customer->tax_number;
        $this->physical_address = $customer->physical_address;
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.customers.customer-list', [
            'customers' => Customer::paginate(10),
        ])->layout('layouts.app', ['header' => 'Manage Customers']);
    }
}
