<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobNote extends Model
{
    use HasFactory, Auditable;

    protected  = [
        'job_id',
        'author_id',
        'note',
        'is_customer_visible',
    ];

    protected  = [
        'is_customer_visible' => 'boolean',
    ];

    public function job()
    {
        return ->belongsTo(WorkshopJob::class, 'job_id');
    }

    public function author()
    {
        return ->belongsTo(User::class, 'author_id');
    }
}
