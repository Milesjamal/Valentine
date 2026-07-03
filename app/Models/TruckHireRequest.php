<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckHireRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'truck_id',
        'requested_start_date',
        'requested_end_date',
        'destination',
        'job_description',
        'status',
    ];

    protected $casts = [
        'requested_start_date' => 'date',
        'requested_end_date' => 'date',
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
