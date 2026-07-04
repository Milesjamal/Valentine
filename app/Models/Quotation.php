<?php

namespace App\Models;

use App\Traits\HasBranchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quotation extends Model
{
    use HasFactory, HasBranchScope;

    protected  = [
        'quotation_number',
        'job_id',
        'customer_id',
        'branch_id',
        'status',
        'subtotal',
        'discount_amount',
        'tax_amount',
        'total',
        'valid_until',
        'notes',
        'created_by',
        'decided_at',
        'decided_by',
    ];

    protected  = [
        'valid_until' => 'date',
        'decided_at' => 'datetime',
        'total' => 'decimal:2',
    ];

    public function customer(): BelongsTo
    {
        return ->belongsTo(Customer::class);
    }

    public function job(): BelongsTo
    {
        return ->belongsTo(WorkshopJob::class, 'job_id');
    }

    public function items(): HasMany
    {
        return ->hasMany(QuotationItem::class);
    }
}
