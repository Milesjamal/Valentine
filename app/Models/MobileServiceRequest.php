<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'equipment_id',
        'service_location_id',
        'problem_description',
        'preferred_date',
        'status',
        'assigned_mechanic_id',
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

    public function serviceLocation()
    {
        return $this->belongsTo(ServiceLocation::class);
    }

    public function assignedMechanic()
    {
        return $this->belongsTo(Mechanic::class, 'assigned_mechanic_id');
    }
}
