<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    public function run(): void
    {
        CompanyProfile::updateOrCreate(['id' => 1], [
            'company_name' => 'GearTrail Machinery Supplies and Maintenance',
            'motto' => 'Powering Performance, Delivering Reliability.',
            'physical_address' => 'Makwenda Garage, Opposite Caravan Park, Zvishavane, Zimbabwe',
            'phone_numbers' => [
                '+263 78 194 6496',
                '+263 78 735 1833'
            ],
            'email' => 'geartrailmachinery@gmail.com',
            'director_name' => 'Wallace',
            'management_contacts' => [
                ['name' => 'Wallace', 'role' => 'Director', 'phone' => '+263 78 735 1833'],
                ['name' => 'Invence', 'role' => 'Management', 'phone' => '+263 78 268 7024'],
                ['name' => 'Rassy', 'role' => 'Management', 'phone' => '+263 77 989 6149'],
                ['name' => 'Victor', 'role' => 'Management', 'phone' => '+263 78 088 7628'],
                ['name' => 'Tino', 'role' => 'Management', 'phone' => '+263 78 212 4917'],
                ['name' => 'Media and Marketing Director', 'role' => 'Marketing', 'phone' => '+263 78 532 5756'],
            ],
            'business_hours' => [
                'Mon-Fri' => '08:00 - 17:00',
                'Sat' => '08:00 - 13:00',
                'Sun' => 'Closed',
            ],
            'social_links' => [
                'facebook' => '#',
                'whatsapp' => 'https://wa.me/263781946496',
            ]
        ]);
    }
}
