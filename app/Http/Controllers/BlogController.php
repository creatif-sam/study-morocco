<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('published', true)->latest()->get();
        return view('resources', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('published', true)
            ->firstOrFail();

        return view('blog-show', compact('blog'));
    }

    /**
     * Serve private blog cover images securely
     */
    public function cover($filename)
    {
        // Normalize: keep only the actual filename
        $cleanFilename = basename($filename);

        // Always look inside storage/app/private/blog-covers/
        $path = 'private/blog-covers/' . $cleanFilename;

        if (!Storage::exists($path)) {
            abort(404, "Image not found at: $path");
        }

        $fullPath = storage_path('app/' . $path);

        return response()->file($fullPath, [
            'Content-Type' => mime_content_type($fullPath),
        ]);
    }
}
