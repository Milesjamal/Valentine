<?php

namespace App\Models;

use App\Traits\HasBranchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mechanic extends Model
{
    use HasFactory, HasBranchScope;

    protected  = [
        'user_id',
        'branch_id',
        'employee_code',
        'specialty',
        'certification_notes',
        'is_available',
    ];

    protected  = [
        'is_available' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return ->belongsTo(User::class);
    }

    public function branch(): BelongsTo
    {
        return ->belongsTo(Branch::class);
    }

    public function jobs(): HasMany
    {
        return ->hasMany(WorkshopJob::class, 'assigned_mechanic_id');
    }
}
