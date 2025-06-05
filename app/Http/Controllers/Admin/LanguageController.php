<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class LanguageController extends Controller
{
    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:dashboard']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = Language::query();
        $this->search($data, ['name']);
        $languages = $data->paginate(20);

        return view('admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:languages,name']
        ]);

        Language::create([
            'name' => $request->name
        ]);

        Notify::createdNotification();
        return to_route('admin.languages.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $languages = Language::findOrFail($id);
        return view('admin.language.edit', compact('languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:languages,name,' . $id]
        ]);

        Language::findOrFail($id)->update([
            'name' => $request->name
        ]);

        Notify::updatedNotification();
        return to_route('admin.languages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            Language::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
