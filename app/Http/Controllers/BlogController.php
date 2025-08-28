<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        // only show published blogs, newest first
        $blogs = Blog::where('published', true)->latest()->get();

        return view('resources', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->where('published', true)->firstOrFail();

        return view('blog-show', compact('blog'));
    }
}
