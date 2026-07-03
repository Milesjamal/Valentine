<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'equipment_id',
        'service_id',
        'branch_id',
        'description',
        'preferred_date',
        'status',
        'converted_job_id',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
