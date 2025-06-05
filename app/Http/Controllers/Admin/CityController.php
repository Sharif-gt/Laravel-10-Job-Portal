<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CityController extends Controller
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
        $data = City::query();
        $data->with(['country', 'state']);
        $this->search($data, ['name']);
        $cities = $data->orderBy('id', 'DESC')->paginate(20);

        return view('admin.location.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $countries = Country::all();
        return view('admin.location.city.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'country_id' => ['required', 'integer'],
            'state_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255']
        ]);

        City::create([
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
        ]);

        Notify::createdNotification();
        return to_route('admin.cities.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $cities = City::findOrFail($id);
        $countries = Country::all();
        $states = State::where('country_id', $cities->country_id)->get();

        return view('admin.location.city.edit', compact('cities', 'countries', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'country_id' => ['required', 'integer'],
            'state_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255']
        ]);

        City::findOrFail($id)->update([
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
        ]);

        Notify::updatedNotification();
        return to_route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            City::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
