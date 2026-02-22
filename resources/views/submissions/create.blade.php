@extends('layouts.public', ['title' => 'Kirim Tulisan'])

@section('content')
    <section class="mb-8 rounded-3xl bg-gradient-to-r from-slate-900 via-slate-800 to-blue-900 p-8 text-white">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-300">Kontributor</p>
        <h1 class="mt-3 text-3xl font-black sm:text-4xl">Kirim Tulisan ke Advanced Leader</h1>
        <p class="mt-3 max-w-3xl text-slate-200">Kami membuka ruang kolaborasi untuk komunitas. Kirim tulisan terbaikmu, lalu tim editorial akan meninjau sebelum publikasi.</p>
    </section>

    @if(session('success'))
        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-medium text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid gap-6 lg:grid-cols-3">
        <section class="rounded-2xl border border-slate-200 bg-white p-6 lg:col-span-2">
            <h2 class="text-xl font-black text-slate-900">Formulir Kirim Tulisan</h2>
            <p class="mt-2 text-sm text-slate-600">Minimal 500 karakter untuk naskah agar bisa direview tim editorial.</p>

            <form method="POST" action="{{ route('submissions.store') }}" class="mt-6 grid gap-4">
                @csrf

                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none" required>
                        @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none" required>
                        @error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">Nomor WhatsApp (opsional)</label>
                        <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none">
                        @error('whatsapp')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">Kategori</label>
                        <select name="category_id" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none">
                            <option value="">Pilih kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected((string) old('category_id') === (string) $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="mb-1 block text-sm font-semibold text-slate-700">Judul Tulisan</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none" required>
                    @error('title')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-1 block text-sm font-semibold text-slate-700">Naskah Artikel</label>
                    <textarea name="content" rows="12" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none" required>{{ old('content') }}</textarea>
                    @error('content')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-1 block text-sm font-semibold text-slate-700">Bio Singkat Penulis (opsional)</label>
                    <textarea name="bio" rows="4" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none">{{ old('bio') }}</textarea>
                    @error('bio')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="inline-flex w-fit rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-500">
                    Kirim Tulisan
                </button>
            </form>
        </section>

        <aside class="space-y-6">
            <section class="rounded-2xl border border-slate-200 bg-white p-6">
                <h3 class="text-lg font-black text-slate-900">Panduan Kontributor</h3>
                <ul class="mt-3 list-disc space-y-2 pl-5 text-sm text-slate-600">
                    <li>Topik yang diterima: edukasi, komunitas, opini, teknologi, ekonomi, dan inspirasi.</li>
                    <li>Naskah orisinal, tidak plagiat, dan belum pernah diterbitkan media lain.</li>
                    <li>Gunakan bahasa yang rapi, mudah dipahami, dan bernilai bagi pembaca.</li>
                    <li>Tim editorial dapat melakukan penyuntingan seperlunya sebelum terbit.</li>
                </ul>
            </section>

            <section class="rounded-2xl border border-slate-200 bg-white p-6">
                <h3 class="text-lg font-black text-slate-900">Produk Advanced Leader</h3>
                <p class="mt-2 text-sm text-slate-600">Lihat juga produk dan program resmi kami untuk pengembangan komunitas.</p>
                <a href="{{ route('products.index') }}" class="mt-4 inline-flex rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-500">Lihat Produk</a>
            </section>
        </aside>
    </div>
@endsection
