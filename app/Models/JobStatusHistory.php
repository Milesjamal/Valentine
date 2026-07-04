<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobStatusHistory extends Model
{
    use HasFactory, Auditable;

    protected  = 'job_status_history';

    protected  = [
        'job_id',
        'from_status',
        'to_status',
        'changed_by',
        'changed_at',
    ];

    protected  = [
        'changed_at' => 'datetime',
    ];

    public function job()
    {
        return ->belongsTo(WorkshopJob::class, 'job_id');
    }

    public function user()
    {
        return ->belongsTo(User::class, 'changed_by');
    }
}
