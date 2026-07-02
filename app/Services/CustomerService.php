<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    public function createCustomer(array $data)
    {
        return DB::transaction(function () use ($data) {
            $customer = Customer::create($data);

            // If an email is provided and no user exists, we might want to create a portal user in a later phase.
            // For Phase 1, we just manage the records.

            return $customer;
        });
    }

    public function updateCustomer(int $id, array $data)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($data);
        return $customer;
    }
}
