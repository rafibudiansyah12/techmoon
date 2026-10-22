@extends('layouts.public')
@section('title', $portfolio->title.' — TechMoon')
@section('content')
@php $img = $portfolio->image && str_starts_with($portfolio->image,'http') ? $portfolio->image : ($portfolio->image ? Storage::url($portfolio->image) : 'https://placehold.co/1000x650'); @endphp
<section class="bg-slate-50 px-5 py-12 sm:py-16">
    <div class="mx-auto max-w-5xl">
        <a href="{{ route('portfolios') }}" class="inline-flex items-center gap-2 text-sm font-bold text-sky-700 hover:gap-3 transition-all"><span>←</span> Kembali ke portofolio</a>
        <span class="mt-6 block w-fit rounded-full bg-sky-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-sky-800">{{ $portfolio->client_name }}</span>
        <h1 class="section-heading mt-4 text-3xl sm:text-5xl">{{ $portfolio->title }}</h1>
    </div>
</section>

<section class="bg-white px-5 py-12 sm:py-16">
    <div class="mx-auto max-w-5xl">
        <div class="glass-card overflow-hidden rounded-3xl">
            <img class="max-h-[32rem] w-full object-cover" src="{{ $img }}" alt="{{ $portfolio->title }}">
        </div>

        <div class="mt-10 grid gap-8 md:grid-cols-[1fr_18rem]">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Tentang proyek</h2>
                <p class="mt-4 text-lg leading-8 text-slate-600">{{ $portfolio->description }}</p>
            </div>
            <aside class="glass-card h-fit rounded-3xl p-6">
                <dl class="space-y-4 text-sm">
                    <div><dt class="text-xs font-bold uppercase tracking-wider text-slate-500">Klien</dt><dd class="mt-1 font-bold text-slate-900">{{ $portfolio->client_name }}</dd></div>
                    @if($portfolio->product)
                        <div><dt class="text-xs font-bold uppercase tracking-wider text-slate-500">Layanan</dt><dd class="mt-1 font-bold text-slate-900">{{ $portfolio->product->name }}</dd></div>
                    @endif
                </dl>
                @if($portfolio->project_url)
                    <a class="nav-cta mt-6 w-full" href="{{ $portfolio->project_url }}" target="_blank" rel="noopener">Kunjungi proyek ↗</a>
                @endif
            </aside>
        </div>
    </div>
</section>

<section class="bg-slate-50 px-5 py-16">
    <div class="mx-auto max-w-5xl rounded-3xl bg-sky-600 p-10 text-center md:p-12">
        <h2 class="text-2xl font-extrabold text-white md:text-3xl">Tertarik dengan solusi serupa?</h2>
        <a href="{{ route('contact') }}" class="mt-6 inline-flex rounded-2xl bg-white px-6 py-3 font-extrabold !text-sky-700 shadow-lg transition hover:-translate-y-0.5">Minta Penawaran</a>
    </div>
</section>
@endsection
