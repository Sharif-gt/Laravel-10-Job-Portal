<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CastomPage;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\Request;

class CustomPageController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = CastomPage::query();
        $this->search($query, ['page_name']);
        $allPages = $query->paginate(20);

        return view('admin.custom-page.index', compact('allPages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.custom-page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_name' => ['required'],
            'content' => ['required']
        ]);

        $data = new CastomPage();
        $data->page_name = $request->page_name;
        $data->content = $request->content;
        $data->save();

        Notify::createdNotification();
        return to_route('admin.custom-page.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            CastomPage::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
