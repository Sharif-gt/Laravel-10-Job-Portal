<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Services\Notify;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndustryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = Industry::paginate(10);
        return view('admin.industry.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.industry.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industries,name']
        ]);

        // $type = new Industry();
        // $type->name = $request->name;
        // $type->save();

        Industry::create([
            'name' => $request->name
        ]);

        Notify::createdNotification();

        return redirect()->route('admin.industry-type.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $industy_data = Industry::findOrFail($id);
        return view('admin.industry.edit', compact('industy_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industries,name, $id']
        ]);

        Industry::findOrFail($id)->update([
            "name" => $request->name
        ]);

        Notify::updatedNotification();

        return redirect()->route('admin.industry-type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
