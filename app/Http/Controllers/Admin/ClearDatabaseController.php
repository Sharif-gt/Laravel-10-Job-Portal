<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;


class ClearDatabaseController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:database clear']);
    }

    public function index()
    {
        return view('admin.clear-database.index');
    }

    public function clearDatabase()
    {
        try {
            //wipe database
            Artisan::call('migrate:fresh');

            //seed default data
            Artisan::call('db:seed', ['--class' => 'RolePermissionSeeder']);
            Artisan::call('db:seed', ['--class' => 'AdminSeeder']);
            Artisan::call('db:seed', ['--class' => 'SiteSettingSeeder']);
            Artisan::call('db:seed', ['--class' => 'MenuSeeder']);
            Artisan::call('db:seed', ['--class' => 'PaymentSettingSeeder']);
            Artisan::call('db:seed', ['--class' => 'ExperienceSeeder']);
            Artisan::call('db:seed', ['--class' => 'JobTagSeeder']);
            Artisan::call('db:seed', ['--class' => 'JobTypeSeeder']);
            Artisan::call('db:seed', ['--class' => 'SalaryTypeSeeder']);
            Artisan::call('db:seed', ['--class' => 'TeamSizeSeeder']);

            //delete files
            $this->deleteFiles();

            return response(['message' => 'Database Wipe Successfully...']);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteFiles()
    {
        $path = public_path('upload');
        $allFiles = File::allFiles($path);

        foreach ($allFiles as $file) {
            File::delete($file->getRealPath());
        }
    }
}
