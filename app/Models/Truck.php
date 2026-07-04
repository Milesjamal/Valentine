<?php

namespace App\Models;

use App\Traits\HasBranchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Truck extends Model
{
    use HasFactory, HasBranchScope;

    protected $fillable = [
        'registration_number',
        'model',
        'capacity_tonnes',
        'status',
        'branch_id',
        'notes',
    ];

    protected $casts = [
        'capacity_tonnes' => 'decimal:2',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function hireRequests(): HasMany
    {
        return $this->hasMany(TruckHireRequest::class);
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(TruckContract::class);
    }
}
