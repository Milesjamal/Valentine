<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckContract extends Model
{
    use HasFactory;

    protected $fillable = [
        'truck_hire_request_id',
        'truck_id',
        'customer_id',
        'start_date',
        'end_date',
        'rate',
        'rate_type',
        'total_amount',
        'invoice_id',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'rate' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
}
