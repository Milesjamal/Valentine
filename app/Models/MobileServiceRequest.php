<?php

namespace App\Models;

use App\Traits\HasBranchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MobileServiceRequest extends Model
{
    use HasFactory, HasBranchScope;

    protected  = [
        'customer_id',
        'equipment_id',
        'branch_id',
        'service_location_id',
        'problem_description',
        'preferred_date',
        'status',
        'assigned_mechanic_id',
        'converted_job_id',
    ];

    protected  = [
        'preferred_date' => 'date',
    ];

    public function customer(): BelongsTo
    {
        return ->belongsTo(Customer::class);
    }

    public function equipment(): BelongsTo
    {
        return ->belongsTo(Equipment::class);
    }

    public function serviceLocation(): BelongsTo
    {
        return ->belongsTo(ServiceLocation::class);
    }

    public function assignedMechanic(): BelongsTo
    {
        return ->belongsTo(Mechanic::class, 'assigned_mechanic_id');
    }
}
