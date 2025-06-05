<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminBlogRequest;
use App\Http\Requests\Admin\BlogUpdateRequest;
use App\Models\Admin;
use App\Models\Blog;
use App\Services\Notify;
use App\Traits\FileImageUploadTrait;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class BlogController extends Controller
{
    use FileImageUploadTrait, Searchable;

    function __construct()
    {
        $this->middleware(['permission:blogs']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Blog::query();
        $this->search($query, ['title']);
        $blogs = $query->orderBy('id', 'DESC')->paginate(15);

        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminBlogRequest $request)
    {
        $authorId = auth()->guard('admin')->id();
        $image = $this->uploadFile($request, 'image', '/upload');

        $saveBlog = new Blog;
        $saveBlog->author_id = $authorId;
        if (!empty($image)) {
            $saveBlog->image = $image;
        }
        $saveBlog->title = $request->title;
        $saveBlog->description = $request->description;
        $saveBlog->status = $request->status;
        $saveBlog->featured = $request->featured;
        $saveBlog->save();

        Notify::createdNotification();
        return to_route('admin.blogs.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $allBlogs = Blog::findOrFail($id);

        return view('admin.blog.edit', compact('allBlogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogUpdateRequest $request, string $id)
    {

        $authorId = auth()->guard('admin')->id();
        $image = $this->uploadFile($request, 'image', '/upload');

        $updateBlog = Blog::findOrFail($id);
        $updateBlog->author_id = $authorId;
        if ($image) {
            $updateBlog->image = $image;
        }
        $updateBlog->title = $request->title;
        $updateBlog->description = $request->description;
        $updateBlog->status = $request->status;
        $updateBlog->featured = $request->featured;
        $updateBlog->save();

        Notify::updatedNotification();
        return to_route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Blog::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
