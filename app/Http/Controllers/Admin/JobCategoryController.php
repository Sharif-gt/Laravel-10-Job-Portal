<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class JobCategoryController extends Controller
{
    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:job category create update|job category delete'])->only(['index']);
        $this->middleware(['permission:job category create update'])->only(['create', 'store', 'edit', 'update']);
        $this->middleware(['permission:job category delete'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = JobCategory::query();
        $this->search($query, ['name']);
        $jobCategory = $query->paginate(20);

        return view('admin.job.job-category.index', compact('jobCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.job.job-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'icon' => ['required'],
            'name' => ['required', 'max:255']
        ]);

        JobCategory::create([
            'icon' => $request->icon,
            'name' => $request->name,
        ]);

        Notify::createdNotification();
        return to_route('admin.job-category.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $editJob = JobCategory::findOrFail($id);
        return view('admin.job.job-category.edit', compact('editJob'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['nullable'],
            'name' => ['nullable', 'max:255']
        ]);

        $update = JobCategory::findOrFail($id);
        if ($request->filled('icon')) $update->icon = $request->icon;
        $update->name = $request->name;
        $update->popular = $request->popular;
        $update->save();

        Notify::updatedNotification();
        return to_route('admin.job-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            JobCategory::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
