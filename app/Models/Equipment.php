<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'equipment';

    protected $fillable = [
        'customer_id',
        'equipment_name',
        'category',
        'manufacturer',
        'model',
        'serial_number',
        'registration_number',
        'operating_hours',
        'purchase_date',
        'status',
        'notes',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'operating_hours' => 'integer',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(WorkshopJob::class);
    }

    public function maintenanceHistory(): HasMany
    {
        return $this->hasMany(MaintenanceHistory::class);
    }
}
