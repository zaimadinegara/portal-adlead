@extends('layouts.public', ['title' => 'Beranda'])

@section('content')
    <style>
        #latest-news-carousel .carousel-slide {
            opacity: 0;
            transform: translateY(8px) scale(0.99);
            pointer-events: none;
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        #latest-news-carousel .carousel-slide.is-active {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
            z-index: 10;
        }

        #latest-news-carousel .carousel-slide img {
            transform: scale(1.08);
            transition: transform 0.9s ease;
        }

        #latest-news-carousel .carousel-slide.is-active img {
            transform: scale(1);
        }

        #latest-news-carousel .carousel-dot {
            transition: transform 0.25s ease, background-color 0.25s ease, opacity 0.25s ease;
        }

        #latest-news-carousel .carousel-dot.bg-blue-500 {
            transform: scale(1.15);
        }

        #latest-news-carousel .carousel-slide.is-transitioning img {
            transform: scale(1.06);
        }
    </style>

    <section class="mb-6 rounded-3xl bg-gradient-to-r from-slate-900 via-slate-800 to-blue-900 p-8 text-white">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-300">Portal Komunitas</p>
        <h1 class="mt-3 text-3xl font-black leading-tight sm:text-5xl">Advanced Leader Newsroom</h1>
        <p class="mt-3 max-w-3xl text-slate-200">Ruang berita modern untuk komunitas: liputan, opini, inspirasi, dan edukasi yang relevan untuk publik.</p>
        <div class="mt-6 flex flex-wrap gap-3">
            <a href="{{ route('submissions.create') }}" class="rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-500">Kirim Tulisan</a>
            <a href="https://lynk.id/leadersadvanced?fbclid=PAdGRleAQHQ7JleHRuA2FlbQIxMQABp5nyFS4Ywf1KZ68Y-s9nIZ-pKf1KVLC85wg_f6Dycm3U5wRrC1qU2gknDhMq_aem_Lr42ocp8gy3UaZsWMfe90Q&utm_source=ig&utm_medium=social&utm_content=link_in_bio" target="_blank" rel="noopener noreferrer" class="rounded-xl bg-slate-100 px-5 py-3 text-sm font-semibold text-slate-900 hover:bg-white">produk kami</a>
        </div>
    </section>

    <section class="mb-8 grid gap-6 xl:grid-cols-3">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 xl:col-span-2">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <h2 class="text-2xl font-black leading-tight text-slate-900 sm:text-3xl">Berita Hari Ini</h2>
            </div>

            @if(!empty($carouselPosts) && $carouselPosts->isNotEmpty())
                <div id="latest-news-carousel" class="mt-6 overflow-hidden rounded-2xl border border-slate-200 bg-slate-900" data-interval="5000">
                    <div class="relative h-[340px] sm:h-[420px]">
                        @foreach($carouselPosts as $index => $carouselPost)
                            <a
                                href="{{ route('posts.show', $carouselPost) }}"
                                data-slide="{{ $index }}"
                                class="carousel-slide absolute inset-0 {{ $index === 0 ? 'is-active' : '' }}"
                            >
                                @if($carouselPost->image_url)
                                    <img src="{{ $carouselPost->image_url }}" alt="{{ $carouselPost->title }}" class="h-full w-full object-cover">
                                @else
                                    <div class="flex h-full w-full items-center justify-center bg-slate-800 text-slate-300">Gambar belum tersedia</div>
                                @endif

                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/95 via-slate-900/40 to-transparent"></div>

                                <div class="absolute inset-x-0 bottom-0 p-6 text-white">
                                    <p class="inline-flex rounded-lg bg-red-600 px-3 py-1 text-sm font-bold">{{ optional($carouselPost->category)->name ?? 'Umum' }}</p>
                                    <h3 class="mt-3 text-3xl font-black leading-tight sm:text-4xl">{{ $carouselPost->title }}</h3>
                                    <p class="mt-3 text-sm font-medium text-slate-200">{{ $carouselPost->created_at->translatedFormat('l, d F Y') }} | {{ $carouselPost->created_at->format('H:i') }} WIB</p>
                                </div>
                            </a>
                        @endforeach

                        <div class="absolute bottom-5 right-5 flex items-center gap-2 rounded-full bg-slate-900/45 px-2 py-1" aria-label="Navigasi {{ $carouselPosts->count() }} berita terbaru">
                            @foreach($carouselPosts as $index => $carouselPost)
                                <button
                                    type="button"
                                    data-dot="{{ $index }}"
                                    aria-label="Slide {{ $index + 1 }}"
                                    class="carousel-dot h-2.5 w-2.5 rounded-full border border-white/70 {{ $index === 0 ? 'bg-blue-500 opacity-100' : 'bg-white/80 opacity-70' }}"
                                ></button>
                            @endforeach
                        </div>
                    </div>

                    <div class="grid grid-cols-2 divide-x divide-slate-700 bg-slate-950 sm:grid-cols-4">
                        @foreach($carouselPosts->take(4) as $index => $thumbPost)
                            <button type="button" data-thumb="{{ $index }}" class="carousel-thumb text-left">
                                <div class="flex items-start gap-3 p-2 sm:p-3">
                                    @if($thumbPost->image_url)
                                        <img src="{{ $thumbPost->image_url }}" alt="{{ $thumbPost->title }}" class="h-14 w-20 rounded-md object-cover sm:h-16">
                                    @else
                                        <div class="flex h-14 w-20 items-center justify-center rounded-md bg-slate-700 text-[10px] text-slate-300 sm:h-16">No Image</div>
                                    @endif
                                    <p class="line-clamp-3 text-xs font-semibold leading-snug text-slate-100 sm:text-sm">{{ \Illuminate\Support\Str::limit($thumbPost->title, 90) }}</p>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <aside class="rounded-2xl border border-slate-200 bg-white p-6">
            <h2 class="text-sm font-black uppercase tracking-[0.2em] text-blue-700">Trending</h2>
            <ul class="mt-4 space-y-4">
                @forelse($headlinePosts as $headline)
                    <li class="border-b border-slate-100 pb-3 last:border-b-0 last:pb-0">
                        <a href="{{ route('posts.show', $headline) }}" class="font-semibold leading-snug text-slate-800 hover:text-blue-700">{{ $headline->title }}</a>
                        <p class="mt-1 text-xs text-slate-500">{{ $headline->created_at->format('d M Y H:i') }}</p>
                    </li>
                @empty
                    <li class="text-sm text-slate-500">Belum ada headline.</li>
                @endforelse
            </ul>

            <a href="{{ route('submissions.create') }}" class="mt-6 block rounded-xl bg-slate-900 px-4 py-3 text-center text-sm font-semibold text-white hover:bg-slate-800">
                Ingin tulisanmu tayang?
            </a>
        </aside>
    </section>

    <section>
        <div class="mb-5 bg-slate-100 px-3 py-3 sm:px-4">
            <div class="flex items-center justify-between gap-3">
                <h2 class="text-sm font-bold uppercase tracking-wide text-blue-800 sm:text-base">Berita Terkini</h2>
                <a href="https://lynk.id/leadersadvanced?fbclid=PAdGRleAQHQ7JleHRuA2FlbQIxMQABp5nyFS4Ywf1KZ68Y-s9nIZ-pKf1KVLC85wg_f6Dycm3U5wRrC1qU2gknDhMq_aem_Lr42ocp8gy3UaZsWMfe90Q&utm_source=ig&utm_medium=social&utm_content=link_in_bio" target="_blank" rel="noopener noreferrer" class="text-sm font-semibold text-blue-700 hover:underline">Lihat Produk Advanced Leader</a>
            </div>
            <div class="mt-2 h-[3px] w-full rounded-full bg-blue-600"></div>
        </div>

        <div class="divide-y divide-slate-200 rounded-2xl border border-slate-200 bg-white">
            @forelse($latestPosts as $post)
                <article class="al-fade-up p-4 sm:p-5">
                    <a href="{{ route('posts.show', $post) }}" class="grid gap-4 sm:grid-cols-[220px_1fr] sm:items-start">
                        @if($post->image_url)
                            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="h-40 w-full rounded-xl object-cover sm:h-32 sm:w-[220px]">
                        @else
                            <div class="flex h-40 w-full items-center justify-center rounded-xl bg-slate-100 text-xs text-slate-400 sm:h-32 sm:w-[220px]">No Image</div>
                        @endif

                        <div>
                            <p class="text-sm font-bold text-blue-700">{{ optional($post->category)->name ?? 'Umum' }}</p>
                            <h3 class="mt-1 text-2xl font-black leading-tight text-slate-800 sm:text-[2rem]">{{ $post->title }}</h3>
                            <p class="mt-3 text-sm text-slate-500">{{ $post->created_at->format('d M Y') }} | {{ $post->created_at->format('H:i') }} WIB</p>
                        </div>
                    </a>
                </article>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-10 text-center text-slate-500">Belum ada berita yang diterbitkan.</div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $latestPosts->links() }}
        </div>
    </section>

    @if(!empty($sectionPosts) && $sectionPosts->isNotEmpty())
        <section class="mt-10 space-y-8">
            @foreach($sectionPosts as $section)
                <div>
                    <div class="mb-4 bg-slate-100 px-3 py-3 sm:px-4">
                        <div class="flex items-center justify-between gap-3">
                            <h2 class="text-sm font-bold uppercase tracking-wide text-blue-800 sm:text-base">{{ $section['category']->name }}</h2>
                            <a href="{{ route('categories.show', $section['category']) }}" class="text-sm font-semibold text-blue-700 hover:text-blue-600 hover:underline">Lihat semua</a>
                        </div>
                        <div class="mt-2 h-[3px] w-full rounded-full bg-blue-600"></div>
                    </div>
                    <div class="divide-y divide-slate-200 rounded-2xl border border-slate-200 bg-white">
                        @foreach($section['posts'] as $post)
                            <article class="p-4 sm:p-5">
                                <a href="{{ route('posts.show', $post) }}" class="grid gap-4 sm:grid-cols-[180px_1fr] sm:items-start">
                                    @if($post->image_url)
                                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="h-32 w-full rounded-xl object-cover sm:w-[180px]">
                                    @else
                                        <div class="flex h-32 w-full items-center justify-center rounded-xl bg-slate-100 text-xs text-slate-400 sm:w-[180px]">No Image</div>
                                    @endif

                                    <div>
                                        <h3 class="text-xl font-extrabold leading-tight text-slate-800">{{ \Illuminate\Support\Str::limit($post->title, 110) }}</h3>
                                        <p class="mt-2 text-sm text-slate-500">{{ $post->created_at->format('d M Y') }} | {{ $post->created_at->format('H:i') }} WIB</p>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </section>
    @endif

    <section class="mt-10 grid gap-6 lg:grid-cols-2">
        <div class="rounded-2xl bg-slate-900 p-6 text-white">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-300">Kontributor</p>
            <h3 class="mt-2 text-2xl font-black">Punya opini atau cerita komunitas?</h3>
            <p class="mt-3 text-slate-300">Kirim tulisanmu dan terbitkan bersama kanal media Advanced Leader.</p>
            <a href="{{ route('submissions.create') }}" class="mt-5 inline-flex rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-500">Kirim Tulisan Sekarang</a>
        </div>

        <div class="rounded-2xl bg-blue-50 p-6 text-slate-900">
            <p class="text-xs font-bold uppercase tracking-[0.2em]">Store Official</p>
            <h3 class="mt-2 text-2xl font-black">Dukung komunitas lewat produk kami</h3>
            <p class="mt-3">Akses semua program dan produk Advanced Leader melalui halaman resmi lynk.id.</p>
            <a href="{{ route('products.index') }}" class="mt-5 inline-flex rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-500">Lihat Produk</a>
        </div>
    </section>

    <script>
        (() => {
            const carousel = document.getElementById('latest-news-carousel');

            if (!carousel) {
                return;
            }

            const slides = Array.from(carousel.querySelectorAll('.carousel-slide'));
            const dots = Array.from(carousel.querySelectorAll('.carousel-dot'));
            const thumbs = Array.from(carousel.querySelectorAll('.carousel-thumb'));
            const intervalMs = Number(carousel.dataset.interval || 5000);
            const preTransitionMs = 320;

            if (slides.length <= 1) {
                return;
            }

            let activeIndex = 0;
            let timer = null;

            const showSlide = (index) => {
                activeIndex = (index + slides.length) % slides.length;

                slides.forEach((slide, slideIndex) => {
                    slide.classList.toggle('is-active', slideIndex === activeIndex);
                });

                dots.forEach((dot, dotIndex) => {
                    dot.classList.toggle('bg-blue-500', dotIndex === activeIndex);
                    dot.classList.toggle('bg-white/80', dotIndex !== activeIndex);
                    dot.classList.toggle('opacity-100', dotIndex === activeIndex);
                    dot.classList.toggle('opacity-70', dotIndex !== activeIndex);
                });

                thumbs.forEach((thumb, thumbIndex) => {
                    thumb.classList.toggle('bg-blue-600/20', thumbIndex === activeIndex);
                });
            };

            const startAutoRotate = () => {
                timer = window.setTimeout(() => {
                    const activeSlide = slides[activeIndex];

                    activeSlide?.classList.add('is-transitioning');

                    window.setTimeout(() => {
                        activeSlide?.classList.remove('is-transitioning');
                        showSlide(activeIndex + 1);
                        startAutoRotate();
                    }, preTransitionMs);
                }, Math.max(1200, intervalMs - preTransitionMs));
            };

            const restartAutoRotate = () => {
                if (timer) {
                    window.clearTimeout(timer);
                }

                slides.forEach((slide) => {
                    slide.classList.remove('is-transitioning');
                });

                startAutoRotate();
            };

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    showSlide(index);
                    restartAutoRotate();
                });
            });

            thumbs.forEach((thumb, index) => {
                thumb.addEventListener('click', () => {
                    showSlide(index);
                    restartAutoRotate();
                });
            });

            carousel.addEventListener('mouseenter', () => {
                if (timer) {
                    window.clearTimeout(timer);
                }
            });

            carousel.addEventListener('mouseleave', () => {
                restartAutoRotate();
            });

            showSlide(0);
            startAutoRotate();
        })();
    </script>
@endsection
