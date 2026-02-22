<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('q')->toString();

        $baseQuery = Post::query()
            ->published()
            ->with('category')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery
                        ->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->latest();

        $featuredPost = (clone $baseQuery)->first();

        $carouselPosts = (clone $baseQuery)
            ->limit(5)
            ->get();

        $latestPosts = (clone $baseQuery)
            ->when($featuredPost, fn ($query) => $query->whereKeyNot($featuredPost->id))
            ->paginate(9)
            ->withQueryString();

        $headlinePosts = Post::query()
            ->published()
            ->select(['id', 'title', 'slug', 'created_at'])
            ->latest()
            ->limit(8)
            ->get();

        $categories = Category::query()
            ->withCount(['posts' => fn ($query) => $query->published()])
            ->orderBy('name')
            ->get();

        $sectionPosts = $categories
            ->take(6)
            ->map(function (Category $category): array {
                $posts = $category->posts()
                    ->published()
                    ->latest()
                    ->limit(4)
                    ->get();

                return [
                    'category' => $category,
                    'posts' => $posts,
                ];
            })
            ->filter(fn (array $section) => $section['posts'] instanceof Collection && $section['posts']->isNotEmpty())
            ->values();

        return view('home', compact('featuredPost', 'carouselPosts', 'latestPosts', 'headlinePosts', 'categories', 'sectionPosts', 'search'));
    }

    public function show(Post $post): View
    {
        abort_unless($post->is_published, 404);

        $post->load('category');

        $relatedPosts = Post::query()
            ->published()
            ->with('category')
            ->whereKeyNot($post->id)
            ->when($post->category_id, fn ($query) => $query->where('category_id', $post->category_id))
            ->latest()
            ->limit(4)
            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }

    public function category(Category $category): View
    {
        $posts = $category->posts()
            ->published()
            ->with('category')
            ->latest()
            ->paginate(9);

        return view('categories.show', compact('category', 'posts'));
    }
}