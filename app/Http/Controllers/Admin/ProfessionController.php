<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfessionController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = Profession::query();
        $this->search($data, ['name']);
        $Professions = $data->paginate(20);

        return view('admin.profession.index', compact('Professions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.profession.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:professions,name']
        ]);

        Profession::create([
            'name' => $request->name
        ]);

        Notify::createdNotification();
        return to_route('admin.professions.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $professions = Profession::findOrFail($id);
        return view('admin.profession.edit', compact('professions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:professions,name,' . $id]
        ]);

        Profession::findOrFail($id)->update([
            'name' => $request->name
        ]);

        Notify::updatedNotification();
        return to_route('admin.professions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Profession::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
