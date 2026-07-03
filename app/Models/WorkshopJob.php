<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkshopJob extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jobs';

    protected $fillable = [
        'job_number',
        'service_request_id',
        'customer_id',
        'equipment_id',
        'branch_id',
        'assigned_mechanic_id',
        'issue_description',
        'status',
        'diagnosis_notes',
        'completion_report',
        'created_by',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }

    public function mechanic(): BelongsTo
    {
        return $this->belongsTo(Mechanic::class, 'assigned_mechanic_id');
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(JobNote::class, 'job_id');
    }

    public function statusHistory(): HasMany
    {
        return $this->hasMany(JobStatusHistory::class, 'job_id');
    }

    public function quotations(): HasMany
    {
        return $this->hasMany(Quotation::class, 'job_id');
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class, 'job_id');
    }
}
