<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CountryController extends Controller
{
    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:job location']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = Country::query();
        $this->search($data, ['name']);
        $country = $data->orderBy('id', 'DESC')->paginate(20);

        return view('admin.location.country.index', compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.location.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:countries,name']
        ]);

        Country::create([
            'name' => $request->name
        ]);

        Notify::createdNotification();
        return redirect()->route('admin.country.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $country = Country::findOrFail($id);

        return view('admin.location.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:countries,name,' . $id]
        ]);

        Country::findOrFail($id)->update([
            'name' => $request->name
        ]);

        Notify::updatedNotification();
        return to_route('admin.country.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            Country::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
