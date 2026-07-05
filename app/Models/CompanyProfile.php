<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'motto',
        'physical_address',
        'phone_numbers',
        'email',
        'director_name',
        'management_contacts',
        'logo_path',
        'business_hours',
        'social_links',
    ];

    protected $casts = [
        'phone_numbers' => 'json',
        'management_contacts' => 'json',
        'business_hours' => 'json',
        'social_links' => 'json',
    ];
}
