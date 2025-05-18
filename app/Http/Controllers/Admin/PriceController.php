<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PriceRequest;
use App\Models\Price;
use App\Services\Notify;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $plans = Price::all();
        return view('admin.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PriceRequest $request): RedirectResponse
    {
        Price::create([
            'lable' => $request->lable,
            'price' => $request->price,
            'job_limit' => $request->job_limit,
            'feature_job_limit' => $request->feature_job_limit,
            'highlight_job_limit' => $request->highlight_job_limit,
            'profile_verified' => $request->profile_verified,
            'recommended' => $request->recommended,
            'frontend_show' => $request->frontend_show,
            'home_show' => $request->home_show
        ]);

        Notify::createdNotification();
        return to_route('admin.plans.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $plans = Price::findOrFail($id);
        return view('admin.plans.edit', compact('plans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PriceRequest $request, string $id): RedirectResponse
    {
        Price::findOrFail($id)->update([
            'lable' => $request->lable,
            'price' => $request->price,
            'job_limit' => $request->job_limit,
            'feature_job_limit' => $request->feature_job_limit,
            'highlight_job_limit' => $request->highlight_job_limit,
            'profile_verified' => $request->profile_verified,
            'recommended' => $request->recommended,
            'frontend_show' => $request->frontend_show,
            'home_show' => $request->home_show
        ]);

        Notify::updatedNotification();
        return to_route('admin.plans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            Price::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
