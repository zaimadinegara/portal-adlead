<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        // Mengambil semua artikel yang sudah diterbitkan, diurutkan dari yang terbaru
        $posts = Post::where('is_published', true)->latest()->get();

        return view('welcome', compact('posts'));
    }
}