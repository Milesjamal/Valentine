<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'amount',
        'currency',
        'method',
        'gateway',
        'gateway_reference',
        'gateway_meta',
        'status',
        'paid_at',
        'recorded_by',
        'receipt_path',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'gateway_meta' => 'json',
        'paid_at' => 'datetime',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
