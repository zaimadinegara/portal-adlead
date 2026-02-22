@extends('layouts.public', ['title' => 'Produk'])

@section('content')
    <section class="mb-8 rounded-3xl bg-gradient-to-r from-slate-900 via-slate-800 to-blue-900 p-8 text-white">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-300">Store Komunitas</p>
        <h1 class="mt-3 text-3xl font-black sm:text-4xl">Produk Advanced Leader</h1>
        <p class="mt-3 max-w-3xl text-slate-200">Temukan produk digital, mentoring, dan program pengembangan komunitas dari Advanced Leader.</p>
        <a href="{{ $storeUrl }}" target="_blank" rel="noopener noreferrer" class="mt-5 inline-flex rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-500">
            Buka Toko Resmi di lynk.id
        </a>
    </section>

    <section class="grid gap-6 md:grid-cols-2">
        @foreach($products as $product)
            <article class="rounded-2xl border border-slate-200 bg-white p-6 transition hover:-translate-y-1 hover:shadow-lg">
                <h2 class="text-xl font-bold text-slate-900">{{ $product['name'] }}</h2>
                <p class="mt-3 text-sm text-slate-600">{{ $product['description'] }}</p>
                <p class="mt-4 text-sm font-semibold text-slate-800">{{ $product['price'] }}</p>
                <a
                    href="{{ $product['lynk_url'] }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="mt-6 inline-flex rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-500"
                >
                    Beli via lynk.id
                </a>
            </article>
        @endforeach
    </section>
@endsection
