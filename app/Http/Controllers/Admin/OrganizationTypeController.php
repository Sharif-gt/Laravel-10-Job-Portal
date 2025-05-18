<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class OrganizationTypeController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $data = Organization::query();
        $this->search($data, ['name']);
        $organization = $data->paginate(20);

        return view('admin.organization.index', compact('organization'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:organizations,name']
        ]);

        Organization::create([
            'name' => $request->name
        ]);

        Notify::createdNotification();
        return redirect()->route('admin.organization-type.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $organization_data = Organization::findOrFail($id);
        return view('admin.organization.edit', compact('organization_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:organizations,name,' . $id]
        ]);

        Organization::findOrFail($id)->update([
            'name' => $request->name
        ]);

        Notify::updatedNotification();
        return redirect()->route('admin.organization-type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            Organization::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
