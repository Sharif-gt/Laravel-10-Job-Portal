<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = [
            'Government',
            'Semi Government',
            'Public',
            'Private',
            'NGO',
            'International Agencies'
        ];

        foreach ($organizations as $organization) {
            $organizations = new Organization();
            $organizations->name = $organization;
            $organizations->save();
        }
    }
}
