<?php

namespace App\Http\Controllers;

use App\Models\ArticleSubmission;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubmissionController extends Controller
{
    public function create(): View
    {
        $categories = Category::query()->orderBy('name')->get(['id', 'name']);

        return view('submissions.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'whatsapp' => ['nullable', 'string', 'max:40'],
            'title' => ['required', 'string', 'max:190'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'content' => ['required', 'string', 'min:500'],
            'bio' => ['nullable', 'string', 'max:2000'],
        ]);

        ArticleSubmission::query()->create($validated + [
            'status' => ArticleSubmission::STATUS_PENDING,
        ]);

        return redirect()
            ->route('submissions.create')
            ->with('success', 'Tulisan berhasil dikirim. Tim editorial Advanced Leader akan meninjau naskah kamu.');
    }
}
