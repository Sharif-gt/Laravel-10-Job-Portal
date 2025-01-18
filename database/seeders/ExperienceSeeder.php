<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Experirnces = [
            'Fresher',
            '1 Year',
            '2 Year',
            '3+ Year',
            '5+ Year',
            '8+ Year',
            '10+ Year',
            '15+ Year',
        ];

        foreach ($Experirnces as $Experirnces) {
            $data = new Experience();
            $data->name = $Experirnces;
            $data->save();
        }
    }
}
