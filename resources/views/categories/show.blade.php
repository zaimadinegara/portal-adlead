@extends('layouts.public', ['title' => 'Kategori ' . $category->name])

@section('content')
    <section class="mb-6 rounded-2xl border border-slate-200 bg-white p-6">
        <p class="text-xs font-bold uppercase tracking-wider text-blue-700">Kategori</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">{{ $category->name }}</h1>
        <p class="mt-2 text-sm text-slate-600">Menampilkan {{ $posts->total() }} artikel terbaru dalam kategori ini.</p>
    </section>

    <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse($posts as $post)
            <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
                @if($post->image_url)
                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="h-44 w-full object-cover">
                @else
                    <div class="flex h-44 items-center justify-center bg-slate-100 text-xs text-slate-400">No Image</div>
                @endif
                <div class="p-5">
                    <p class="text-xs text-slate-500">{{ $post->created_at->format('d M Y') }}</p>
                    <h2 class="mt-2 text-lg font-bold leading-snug text-slate-900">{{ $post->title }}</h2>
                    <p class="mt-3 text-sm text-slate-600">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 115) }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="mt-4 inline-flex text-sm font-semibold text-blue-700 hover:underline">Baca artikel</a>
                </div>
            </article>
        @empty
            <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white p-10 text-center text-slate-500">Belum ada artikel pada kategori ini.</div>
        @endforelse
    </section>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
