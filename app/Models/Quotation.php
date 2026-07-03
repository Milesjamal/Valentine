<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_number',
        'job_id',
        'customer_id',
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

    protected $casts = [
        'valid_until' => 'date',
        'decided_at' => 'datetime',
        'total' => 'decimal:2',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function job()
    {
        return $this->belongsTo(WorkshopJob::class, 'job_id');
    }

    public function items()
    {
        return $this->hasMany(QuotationItem::class);
    }
}
