<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adlead Portal - Gagasan & Komunitas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">
    <nav class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600 tracking-tight">ADLEAD.</h1>
            <a href="/admin" class="text-sm font-medium text-gray-500 hover:text-blue-600 transition">Admin Panel</a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-12">
        <header class="mb-12 text-center">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Warta Komunitas</h2>
            <p class="text-gray-600 text-lg">Ruang berbagi gagasan, teknologi, dan cerita harian.</p>
        </header>

        <div class="grid md:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                @endif
                
                <div class="p-6">
                    <span class="text-xs font-bold text-blue-500 uppercase tracking-widest">{{ $post->created_at->format('d M Y') }}</span>
                    <h3 class="text-xl font-bold text-gray-900 mt-2 mb-3 leading-tight">{{ $post->title }}</h3>
                    <div class="text-gray-600 text-sm line-clamp-3 mb-4">
                        {!! Str::limit(strip_tags($post->content), 120) !!}
                    </div>
                    <a href="#" class="inline-flex items-center text-blue-600 font-semibold text-sm hover:underline">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500">Belum ada berita yang diterbitkan.</p>
            </div>
            @endforelse
        </div>
    </main>
</body>
</html>