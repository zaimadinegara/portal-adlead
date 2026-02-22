<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($title ?? 'Advanced Leader') . ' | Advanced Leader' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --al-navy: #0f172a;
            --al-surface: #111827;
            --al-accent: #2563eb;
            --al-accent-strong: #1d4ed8;
            --al-accent-soft: #93c5fd;
            --al-line: #1f2937;
        }

        .al-fade-up {
            animation: alFadeUp 0.5s ease-out both;
        }

        #site-header {
            transition: background-color 0.2s ease, box-shadow 0.2s ease;
        }

        #site-topbar {
            overflow: visible;
            max-height: 160px;
            opacity: 1;
            transition: max-height 0.22s ease, opacity 0.2s ease, padding 0.2s ease;
        }

        #site-category-nav {
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }

        #header-search-panel {
            transition: opacity 0.2s ease, transform 0.2s ease;
        }

        .header-category-link {
            color: #cbd5e1;
            transition: color 0.2s ease;
        }

        body.header-scrolled #site-topbar {
            overflow: hidden;
            max-height: 0;
            opacity: 0;
            padding-top: 0;
            padding-bottom: 0;
            pointer-events: none;
        }

        body.header-scrolled #site-header {
            background-color: var(--al-surface) !important;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.24);
        }

        body.header-scrolled #site-category-nav {
            background-color: var(--al-surface);
            border-top-color: var(--al-line);
        }

        body.header-scrolled .header-category-link {
            color: #f8fafc;
        }

        body.header-scrolled .header-category-link:hover {
            color: var(--al-accent-soft);
        }

        @keyframes alFadeUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-900">
    <header id="site-header" class="sticky top-0 z-40 border-b border-slate-800 text-white backdrop-blur" style="background-color: rgba(15, 23, 42, 0.96)">
        <div id="site-topbar" class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}" class="group block">
                <img
                    src="{{ asset('images/advanced-leader-logo.png') }}"
                    alt="Advanced Leader"
                    class="h-14 w-auto sm:h-16"
                >
            </a>

            <div class="flex items-center gap-2">
                <div class="relative">
                    <button
                        type="button"
                        id="header-search-toggle"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-slate-700 bg-slate-900/70 text-slate-100 hover:border-blue-400 hover:text-blue-300"
                        aria-label="Buka pencarian"
                        aria-expanded="false"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4"><path d="M10.5 3a7.5 7.5 0 0 1 5.964 12.05l4.243 4.243-1.414 1.414-4.243-4.243A7.5 7.5 0 1 1 10.5 3Zm0 2a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11Z"/></svg>
                    </button>

                    <form
                        id="header-search-panel"
                        method="GET"
                        action="{{ route('home') }}"
                        class="pointer-events-none absolute right-0 top-full z-50 mt-2 w-[min(20rem,calc(100vw-2rem))] -translate-y-2 rounded-xl border border-slate-700 bg-slate-900 p-3 opacity-0 shadow-xl"
                    >
                        <div class="flex items-center gap-2">
                            <input
                                type="text"
                                name="q"
                                value="{{ request('q') }}"
                                placeholder="Cari berita atau artikel..."
                                class="w-full rounded-lg border border-slate-700 bg-slate-950 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none"
                            >
                            <button type="submit" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-blue-600 text-white hover:bg-blue-500" aria-label="Cari">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4"><path d="M10.5 3a7.5 7.5 0 0 1 5.964 12.05l4.243 4.243-1.414 1.414-4.243-4.243A7.5 7.5 0 1 1 10.5 3Zm0 2a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11Z"/></svg>
                            </button>
                        </div>
                    </form>
                </div>

                <a href="https://instagram.com/advancedleader" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full border border-slate-700 bg-slate-900/70 px-3 py-2 text-xs font-semibold text-slate-100 hover:border-blue-400 hover:text-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4"><path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5a4.25 4.25 0 0 0 4.25 4.25h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5a4.25 4.25 0 0 0-4.25-4.25h-8.5Zm8.75 2a1 1 0 1 1 0 2 1 1 0 0 1 0-2ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 1.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Z"/></svg>
                    <span class="hidden sm:inline">advancedleader</span>
                </a>
                <a href="https://www.tiktok.com/@advancedleader" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full border border-slate-700 bg-slate-900/70 px-3 py-2 text-xs font-semibold text-slate-100 hover:border-blue-400 hover:text-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4"><path d="M16 3c.5 1.8 1.7 3 3.5 3.5V9A6.8 6.8 0 0 1 16 8v7.2a5.2 5.2 0 1 1-5.2-5.2c.3 0 .7 0 1 .1v2.7a2.5 2.5 0 0 0-.9-.1 2.5 2.5 0 1 0 2.5 2.5V3H16Z"/></svg>
                    <span class="hidden sm:inline">advancedleader</span>
                </a>
            </div>
        </div>

        @if(!empty($categories) && count($categories) > 0)
            <div id="site-category-nav" class="border-t border-slate-800 bg-slate-900/80">
                <div class="mx-auto flex max-w-7xl items-center gap-5 overflow-x-auto px-4 py-3 text-sm sm:px-6 lg:px-8">
                    <a href="{{ route('home') }}" class="header-category-link inline-flex h-7 w-7 items-center justify-center rounded-md border border-slate-700 hover:border-slate-500" aria-label="Beranda">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4"><path d="M12 3.3 3 10v10.5A1.5 1.5 0 0 0 4.5 22h15a1.5 1.5 0 0 0 1.5-1.5V10l-9-6.7Zm-3 17.2v-6h6v6H9Z"/></svg>
                    </a>
                    @foreach($categories as $menuCategory)
                        <a href="{{ route('categories.show', $menuCategory) }}" class="header-category-link whitespace-nowrap font-semibold hover:text-blue-300">
                            {{ $menuCategory->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </header>

    <main class="mx-auto min-h-[calc(100vh-180px)] max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <footer class="border-t border-slate-800 text-slate-300" style="background-color: var(--al-navy)">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 py-10 sm:px-6 lg:grid-cols-3 lg:px-8">
            <div>
                <a href="{{ route('home') }}" class="inline-block">
                    <img
                        src="{{ asset('images/advanced-leader-logo.png') }}"
                        alt="Advanced Leader"
                        class="h-16 w-auto"
                    >
                </a>
                <p class="mt-2 text-sm text-slate-400">Portal berita komunitas modern untuk artikel, opini, dan informasi edukatif.</p>
                <div class="mt-4 flex items-center gap-2">
                    <a href="https://instagram.com/advancedleader" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-lg border border-slate-700 px-3 py-2 text-xs font-semibold text-slate-200 hover:border-blue-400 hover:text-blue-300">Instagram @advancedleader</a>
                    <a href="https://www.tiktok.com/@advancedleader" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-lg border border-slate-700 px-3 py-2 text-xs font-semibold text-slate-200 hover:border-blue-400 hover:text-blue-300">TikTok @advancedleader</a>
                </div>
            </div>
            <div class="text-sm">
                <p class="font-semibold text-white">Menu</p>
                <div class="mt-3 space-y-2">
                    <a class="block hover:text-blue-300" href="{{ route('home') }}">Beranda</a>
                    <a class="block hover:text-blue-300" href="{{ route('submissions.create') }}">Kirim Tulisan</a>
                    <a class="block hover:text-blue-300" href="{{ route('products.index') }}">Produk</a>
                </div>
            </div>
            <div class="text-sm">
                <p class="font-semibold text-white">Kolaborasi</p>
                <p class="mt-3 text-slate-400">Punya ide artikel atau ingin promosi komunitas? Kirim tulisan lewat halaman kontribusi atau hubungi tim admin.</p>
                <p class="mt-3 text-slate-300">
                    Email: <a href="mailto:leadersadvanced@gmail.com" class="font-semibold text-blue-300 hover:text-blue-200">leadersadvanced@gmail.com</a>
                </p>
            </div>
        </div>
        <div class="border-t border-slate-800 py-4 text-center text-xs text-slate-500">
            © {{ now()->year }} Advanced Leader. All rights reserved.
        </div>
    </footer>

    @if(!empty($activePopupAd))
        <div
            id="popup-ad"
            class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/70 p-4"
            data-id="{{ $activePopupAd->id }}"
            data-delay="{{ $activePopupAd->delay_seconds ?? 2 }}"
        >
            <div class="al-fade-up relative w-full max-w-2xl overflow-hidden rounded-2xl bg-white shadow-2xl">
                <button type="button" id="popup-close" class="absolute right-3 top-3 rounded-full bg-slate-900/80 px-3 py-1 text-xs font-semibold text-white">Tutup</button>
                @if($activePopupAd->image_url)
                    <img src="{{ $activePopupAd->image_url }}" alt="{{ $activePopupAd->title }}" class="h-72 w-full object-cover sm:h-96">
                @endif
                <div class="p-6">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-700">Info Komunitas</p>
                    <h3 class="mt-2 text-2xl font-black text-slate-900">{{ $activePopupAd->title }}</h3>
                    @if($activePopupAd->external_url)
                        <a href="{{ $activePopupAd->external_url }}" target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-500">
                            {{ $activePopupAd->button_label ?: 'Lihat Sekarang' }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <script>
        const syncHeaderOnScroll = () => {
            document.body.classList.toggle('header-scrolled', window.scrollY > 60);
        };

        window.addEventListener('scroll', syncHeaderOnScroll, { passive: true });
        syncHeaderOnScroll();

        const popupAd = document.getElementById('popup-ad');
        const searchToggle = document.getElementById('header-search-toggle');
        const searchPanel = document.getElementById('header-search-panel');

        if (searchToggle && searchPanel) {
            const searchInput = searchPanel.querySelector('input[name="q"]');

            const closeSearch = () => {
                searchPanel.classList.add('opacity-0', '-translate-y-2', 'pointer-events-none');
                searchToggle.setAttribute('aria-expanded', 'false');
            };

            const openSearch = () => {
                searchPanel.classList.remove('opacity-0', '-translate-y-2', 'pointer-events-none');
                searchToggle.setAttribute('aria-expanded', 'true');
                searchInput?.focus();
            };

            searchToggle.addEventListener('click', () => {
                const isOpen = searchToggle.getAttribute('aria-expanded') === 'true';

                if (isOpen) {
                    closeSearch();
                    return;
                }

                openSearch();
            });

            document.addEventListener('click', (event) => {
                if (!searchPanel.contains(event.target) && !searchToggle.contains(event.target)) {
                    closeSearch();
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    closeSearch();
                }
            });
        }

        if (popupAd) {
            const popupId = popupAd.dataset.id;
            const delayMs = Number(popupAd.dataset.delay || 2) * 1000;
            const storageKey = `advanced-leader-popup-${popupId}`;

            if (!sessionStorage.getItem(storageKey)) {
                setTimeout(() => {
                    popupAd.classList.remove('hidden');
                    popupAd.classList.add('flex');
                }, delayMs);
            }

            document.getElementById('popup-close')?.addEventListener('click', () => {
                popupAd.classList.add('hidden');
                popupAd.classList.remove('flex');
                sessionStorage.setItem(storageKey, '1');
            });

            popupAd.addEventListener('click', (event) => {
                if (event.target === popupAd) {
                    popupAd.classList.add('hidden');
                    popupAd.classList.remove('flex');
                    sessionStorage.setItem(storageKey, '1');
                }
            });
        }
    </script>
</body>
</html>
