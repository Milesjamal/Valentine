<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number',
        'model',
        'capacity_tonnes',
        'status',
        'notes',
    ];

    protected $casts = [
        'capacity_tonnes' => 'decimal:2',
    ];

    public function hireRequests()
    {
        return $this->hasMany(TruckHireRequest::class);
    }

    public function contracts()
    {
        return $this->hasMany(TruckContract::class);
    }
}
