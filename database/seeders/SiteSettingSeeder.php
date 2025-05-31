<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $site_settings = array(
            array(
                "id" => 1,
                "key" => "site_name",
                "value" => "JOBLIST",
                "created_at" => "2025-02-07 04:05:57",
                "updated_at" => "2025-02-07 04:05:57",
            ),
            array(
                "id" => 2,
                "key" => "site_email",
                "value" => "joblist@gmail.com",
                "created_at" => "2025-02-07 04:05:58",
                "updated_at" => "2025-02-07 04:05:58",
            ),
            array(
                "id" => 3,
                "key" => "site_phone",
                "value" => "+3589509",
                "created_at" => "2025-02-07 04:05:59",
                "updated_at" => "2025-02-07 04:05:59",
            ),
            array(
                "id" => 4,
                "key" => "site_default_currency",
                "value" => "USD",
                "created_at" => "2025-02-07 04:05:59",
                "updated_at" => "2025-02-07 04:05:59",
            ),
            array(
                "id" => 5,
                "key" => "currency_icon",
                "value" => "$",
                "created_at" => "2025-02-07 04:05:59",
                "updated_at" => "2025-02-07 04:05:59",
            ),
        );

        DB::table('site_settings')->insert($site_settings);
    }
}
