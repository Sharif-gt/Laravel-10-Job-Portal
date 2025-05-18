<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustrieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries = [
            'Manufacturing',
            'Technology',
            'Healthcare',
            'Financial Services',
            'Energy',
            'Retail',
            'Telecommunications',
            'Agriculture',
            'Transportation and Logistics',
            'Entertainment and Media',
            'Construction',
            'Automotive',
            'Tourism and Hospitality',
            'Education',
            'Real Estate',
            'Pharmaceutical',
            'Consumer Goods',
            'Environmental',
            'Defense and Aerospace',
            'Legal and Professional Services'
        ];

        foreach ($industries as $industry) {
            $industries = new Industry();
            $industries->name = $industry;
            $industries->save();
        }
    }
}
