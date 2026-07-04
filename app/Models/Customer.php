<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\HasBranchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes, Auditable, HasBranchScope;

    protected  = [
        'user_id',
        'branch_id',
        'company_name',
        'contact_name',
        'phone',
        'email',
        'billing_address',
        'physical_address',
        'tax_number',
        'notes',
        'is_active',
    ];

    protected  = [
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return ->belongsTo(User::class);
    }

    public function branch(): BelongsTo
    {
        return ->belongsTo(Branch::class);
    }

    public function communicationLogs(): HasMany
    {
        return ->hasMany(CustomerNote::class);
    }

    public function equipment(): HasMany
    {
        return ->hasMany(Equipment::class);
    }
}
