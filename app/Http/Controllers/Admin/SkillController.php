<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Return_;

class SkillController extends Controller
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
        $data = Skill::query();
        $this->search($data, ['name']);
        $skills = $data->paginate(20);

        return view('admin.Skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.Skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:skills,name']
        ]);

        Skill::create([
            'name' => $request->name
        ]);

        Notify::createdNotification();
        return to_route('admin.skills.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $skills = Skill::findOrFail($id);

        return view('admin.Skills.edit', compact('skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:skills,name,' . $id]
        ]);

        Skill::findOrFail($id)->update([
            'name' => $request->name
        ]);

        Notify::updatedNotification();
        return to_route('admin.skills.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            Skill::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
