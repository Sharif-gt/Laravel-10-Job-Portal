<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $job_categories = array(
            "Healthcare",
            "Technology",
            "Business and Finance",
            "Education",
            "Construction",
            "Manufacturing",
            "Sales and Marketing",
            "Transportation and Logistics",
            "Green Jobs",
            "Creative and Media"
        );

        foreach ($job_categories as $categories) {
            $data = new JobCategory();
            $data->icon = 'fab fa-adn';
            $data->name = $categories;
            $data->save();
        }
    }
}
