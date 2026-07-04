<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\HasBranchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use HasFactory, SoftDeletes, Auditable, HasBranchScope;

    protected  = 'equipment';

    protected  = [
        'customer_id',
        'branch_id',
        'equipment_name',
        'category',
        'manufacturer',
        'model',
        'serial_number',
        'registration_number',
        'operating_hours',
        'purchase_date',
        'status',
        'notes',
    ];

    protected  = [
        'purchase_date' => 'date',
        'operating_hours' => 'integer',
    ];

    public function customer(): BelongsTo
    {
        return ->belongsTo(Customer::class);
    }

    public function branch(): BelongsTo
    {
        return ->belongsTo(Branch::class);
    }

    public function jobs(): HasMany
    {
        return ->hasMany(WorkshopJob::class, 'equipment_id');
    }

    public function maintenanceHistory(): HasMany
    {
        return ->hasMany(MaintenanceHistory::class, 'equipment_id');
    }

    public function media()
    {
        return ->morphMany(Media::class, 'mediable');
    }
}
