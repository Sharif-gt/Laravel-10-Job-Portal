<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $education = [
            'Intermediate',
            'Bachelor Degree',
            'PhD',
            'High School',
            'Any',
        ];

        foreach ($education as $edu) {
            $data = new Education();
            $data->name = $edu;
            $data->save();
        }
    }
}
