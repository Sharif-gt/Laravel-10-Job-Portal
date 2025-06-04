<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // All permission seed
        $permissions = array(
            array('id' => '1', 'name' => 'dashboard', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:33:18', 'updated_at' => '2025-06-04 08:33:18'),
            array('id' => '2', 'name' => 'order index', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:33:40', 'updated_at' => '2025-06-04 08:33:40'),
            array('id' => '3', 'name' => 'job category create update', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:34:20', 'updated_at' => '2025-06-04 08:34:20'),
            array('id' => '4', 'name' => 'job category delete', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:34:55', 'updated_at' => '2025-06-04 08:34:55'),
            array('id' => '5', 'name' => 'job create update', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:35:22', 'updated_at' => '2025-06-04 08:35:22'),
            array('id' => '6', 'name' => 'job delete', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:35:35', 'updated_at' => '2025-06-04 08:35:35'),
            array('id' => '7', 'name' => 'job attributes', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:36:43', 'updated_at' => '2025-06-04 08:36:43'),
            array('id' => '8', 'name' => 'job location', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:36:58', 'updated_at' => '2025-06-04 08:36:58'),
            array('id' => '9', 'name' => 'sections', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:37:21', 'updated_at' => '2025-06-04 08:37:21'),
            array('id' => '10', 'name' => 'site pages', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:37:44', 'updated_at' => '2025-06-04 08:37:44'),
            array('id' => '11', 'name' => 'site footer', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:37:57', 'updated_at' => '2025-06-04 08:37:57'),
            array('id' => '12', 'name' => 'blogs', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:38:18', 'updated_at' => '2025-06-04 08:38:18'),
            array('id' => '13', 'name' => 'price plan', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:38:41', 'updated_at' => '2025-06-04 08:38:41'),
            array('id' => '14', 'name' => 'news letter', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:39:01', 'updated_at' => '2025-06-04 08:39:01'),
            array('id' => '15', 'name' => 'menu builder', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:39:26', 'updated_at' => '2025-06-04 08:39:26'),
            array('id' => '16', 'name' => 'access management', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:39:50', 'updated_at' => '2025-06-04 08:39:50'),
            array('id' => '17', 'name' => 'payment settings', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:40:13', 'updated_at' => '2025-06-04 08:40:13'),
            array('id' => '18', 'name' => 'site settings', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:40:30', 'updated_at' => '2025-06-04 08:40:30'),
            array('id' => '19', 'name' => 'database clear', 'guard_name' => 'admin', 'created_at' => '2025-06-04 08:40:54', 'updated_at' => '2025-06-04 08:40:54')
        );

        DB::table('permissions')->insert($permissions);


        // role seed
        $roles = array(
            array('id' => '1', 'name' => 'Super Admin', 'guard_name' => 'admin', 'created_at' => '2025-06-04 10:43:13', 'updated_at' => '2025-06-04 10:43:13')
        );

        DB::table('roles')->insert($roles);

        // role has permission seed
        $role_has_permissions = array(
            array('permission_id' => '1', 'role_id' => '1'),
            array('permission_id' => '2', 'role_id' => '1'),
            array('permission_id' => '3', 'role_id' => '1'),
            array('permission_id' => '4', 'role_id' => '1'),
            array('permission_id' => '5', 'role_id' => '1'),
            array('permission_id' => '6', 'role_id' => '1'),
            array('permission_id' => '7', 'role_id' => '1'),
            array('permission_id' => '8', 'role_id' => '1'),
            array('permission_id' => '9', 'role_id' => '1'),
            array('permission_id' => '10', 'role_id' => '1'),
            array('permission_id' => '11', 'role_id' => '1'),
            array('permission_id' => '12', 'role_id' => '1'),
            array('permission_id' => '13', 'role_id' => '1'),
            array('permission_id' => '14', 'role_id' => '1'),
            array('permission_id' => '15', 'role_id' => '1'),
            array('permission_id' => '16', 'role_id' => '1'),
            array('permission_id' => '17', 'role_id' => '1'),
            array('permission_id' => '18', 'role_id' => '1'),
            array('permission_id' => '19', 'role_id' => '1')
        );

        DB::table('role_has_permissions')->insert($role_has_permissions);
    }
}
