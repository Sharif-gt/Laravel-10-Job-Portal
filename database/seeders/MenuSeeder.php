<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_menus = array(
            array(
                "id" => 1,
                "name" => "Navigation Menu",
                "created_at" => NULL,
                "updated_at" => NULL,
            ),
            array(
                "id" => 3,
                "name" => "Footer Menu One",
                "created_at" => "2025-05-29 09:36:35",
                "updated_at" => "2025-05-29 09:36:35",
            ),
            array(
                "id" => 4,
                "name" => "Footer Menu Two",
                "created_at" => "2025-05-29 09:38:06",
                "updated_at" => "2025-05-29 09:38:06",
            ),
            array(
                "id" => 5,
                "name" => "Footer Menu Three",
                "created_at" => "2025-05-29 09:39:08",
                "updated_at" => "2025-05-29 09:39:08",
            ),
            array(
                "id" => 6,
                "name" => "Footer Menu Four",
                "created_at" => "2025-05-29 09:40:10",
                "updated_at" => "2025-05-29 09:40:10",
            ),
        );

        DB::table('admin_menus')->insert($admin_menus);
    }
}
