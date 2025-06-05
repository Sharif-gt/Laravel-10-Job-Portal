<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\Notify;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:access management']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roleUser = Admin::all();

        return view('admin.access-management.user-role.index', compact('roleUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.access-management.user-role.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:admins,email'],
            'password' => ['required', 'confirmed']
        ]);

        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        //Assign role
        $user->assignRole($request->role);

        Notify::createdNotification();
        return to_route('admin.user-role.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Admin::findOrFail($id);
        $roles = Role::all();

        return view('admin.access-management.user-role.edit', compact('data', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:admins,email,' . $id],
            'password' => ['confirmed'],
            'role' => ['required']
        ]);

        $data = Admin::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->password) $data->password = bcrypt($request->password);
        $data->save();

        //Assign role
        $data->assignRole($request->role);

        Notify::createdNotification();
        return to_route('admin.user-role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);
        if ($admin?->getRoleNames()->first() === 'Super Admin') {
            return response(['message' => 'You can\'t delete super admin!'], 500);
        }

        try {
            Admin::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
