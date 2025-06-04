<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AccessManagementController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Role::query();
        $this->search($query, ['name']);
        $roles = $query->paginate(20);

        return view('admin.access-management.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        // dd($permissions);

        return view('admin.access-management.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:roles,name'],
        ]);

        //create role
        $role = Role::create(['guard_name' => 'admin', 'name' => $request->name]);

        // Assign permissions to the role
        $role->syncPermissions($request->permissions);

        Notify::createdNotification();
        return to_route('admin.role.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = $roles?->permissions;
        $rolePermissions = $rolePermissions->pluck('name')->toArray();

        return view('admin.access-management.roles.edit', compact('roles', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'unique:roles,name,' . $id],
        ]);

        //create role
        $role = Role::findOrFail($id);
        $role->update(['guard_name' => 'admin', 'name' => $request->name]);

        // Assign permissions to the role
        $role->syncPermissions($request->permissions);

        Notify::createdNotification();
        return to_route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Role::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
