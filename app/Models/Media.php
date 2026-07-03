<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
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
        return $this->morphTo();
    }
}
