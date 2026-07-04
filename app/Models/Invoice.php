<?php

namespace App\Models;

use App\Traits\HasBranchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory, HasBranchScope;

    protected  = [
        'invoice_number',
        'job_id',
        'quotation_id',
        'customer_id',
        'branch_id',
        'status',
        'subtotal',
        'discount_amount',
        'tax_amount',
        'total',
        'amount_paid',
        'due_date',
        'issued_at',
    ];

    protected  = [
        'due_date' => 'date',
        'issued_at' => 'datetime',
        'subtotal' => 'decimal:2',
        'total' => 'decimal:2',
        'amount_paid' => 'decimal:2',
    ];

    public function customer(): BelongsTo
    {
        return ->belongsTo(Customer::class);
    }

    public function job(): BelongsTo
    {
        return ->belongsTo(WorkshopJob::class, 'job_id');
    }

    public function quotation(): BelongsTo
    {
        return ->belongsTo(Quotation::class);
    }

    public function items(): HasMany
    {
        return ->hasMany(InvoiceItem::class);
    }

    public function payments(): HasMany
    {
        return ->hasMany(Payment::class);
    }
}
