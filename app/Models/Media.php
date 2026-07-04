<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory, Auditable;

    protected  = [
        'mediable_type',
        'mediable_id',
        'collection',
        'type',
        'disk',
        'path',
        'original_filename',
        'mime_type',
        'size',
        'uploaded_by',
    ];

    public function mediable()
    {
        return ->morphTo();
    }

    public function uploader()
    {
        return ->belongsTo(User::class, 'uploaded_by');
    }
}
