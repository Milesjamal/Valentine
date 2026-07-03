<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceHistory extends Model
{
    use HasFactory;

    protected $table = 'maintenance_history';

    protected $fillable = [
        'equipment_id',
        'job_id',
        'summary',
        'parts_replaced',
        'technician_notes',
        'performed_at',
        'created_by',
    ];

    protected $casts = [
        'parts_replaced' => 'json',
        'performed_at' => 'date',
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function job()
    {
        return $this->belongsTo(WorkshopJob::class, 'job_id');
    }
}
