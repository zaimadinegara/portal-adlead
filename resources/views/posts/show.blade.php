@extends('layouts.public', ['title' => $post->title])

@section('content')
    <article class="mx-auto max-w-5xl overflow-hidden rounded-2xl border border-slate-200 bg-white">
        @if($post->image_url)
            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="h-72 w-full object-cover sm:h-[460px]">
        @endif

        <div class="p-6 sm:p-10">
            <p class="text-xs font-bold uppercase tracking-wider text-blue-700">
                {{ optional($post->category)->name ?? 'Umum' }} • {{ $post->created_at->format('d M Y H:i') }}
            </p>
            <h1 class="mt-3 text-3xl font-black leading-tight text-slate-900 sm:text-4xl">{{ $post->title }}</h1>

            <div class="prose prose-slate mt-8 max-w-none leading-relaxed">
                {!! $post->content !!}
            </div>
        </div>
    </article>

    <section class="mx-auto mt-8 max-w-5xl">
        <div class="mb-5 flex items-center justify-between">
            <h2 class="text-xl font-black text-slate-900">Artikel Lainnya</h2>
            <a href="{{ route('home') }}" class="text-sm font-semibold text-blue-700 hover:underline">Kembali ke beranda</a>
        </div>

        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            @forelse($relatedPosts as $related)
                <a href="{{ route('posts.show', $related) }}" class="rounded-xl border border-slate-200 bg-white p-5 hover:border-blue-400">
                    <p class="text-xs font-semibold uppercase tracking-wider text-blue-700">{{ optional($related->category)->name ?? 'Umum' }}</p>
                    <h3 class="mt-2 font-bold leading-snug text-slate-900">{{ $related->title }}</h3>
                </a>
            @empty
                <p class="text-sm text-slate-500">Belum ada artikel terkait.</p>
            @endforelse
        </div>
    </section>
@endsection
