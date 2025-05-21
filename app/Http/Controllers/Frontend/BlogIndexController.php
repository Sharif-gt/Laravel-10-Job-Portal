<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\Searchable;
use Illuminate\Http\Request;

class BlogIndexController extends Controller
{
    use Searchable;

    public function index()
    {
        $query = Blog::query();
        $this->search($query, ['title']);
        $blogs = $query->where('status', 1)->orderBy('id', 'DESC')->paginate(6);

        $feturedBlog = Blog::where(['status' => 1, 'featured' => 1])->orderBy('id', 'DESC')->take(7)->get();
        $blogImage = Blog::where('status', 1)->orderBy('id', 'DESC')->take(9)->select('image')->get();

        return view('frontend.pages.blog.index', compact('blogs', 'feturedBlog', 'blogImage'));
    }

    public function blogDetail(string $slug)
    {
        $blogShow = Blog::where('slug', $slug)->firstOrFail();

        return view('frontend.pages.blog.blog-details', compact('blogShow'));
    }
}
