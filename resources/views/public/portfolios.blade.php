@extends('layouts.public')
@section('title','Portofolio — TechMoon')
@section('description','Lihat hasil kolaborasi TechMoon bersama bisnis, UMKM, dan institusi.')
@section('content')
@php
    $grads = [
        'from-sky-500 via-blue-600 to-indigo-700',
        'from-cyan-400 via-teal-500 to-emerald-600',
        'from-violet-500 via-purple-600 to-indigo-700',
        'from-amber-400 via-orange-500 to-rose-600',
        'from-pink-500 via-rose-500 to-orange-500',
        'from-emerald-400 via-green-500 to-teal-700',
    ];
    $resolveImg = function ($p) {
        if (!$p->image || str_contains($p->image, 'placehold.co')) return null;
        return str_starts_with($p->image, 'http') ? $p->image : Storage::url($p->image);
    };
@endphp

{{-- Hero --}}
<section class="page-hero px-5 py-20 sm:py-28">
    <div class="ph-orb -right-20 -top-32 h-96 w-96"></div>
    <div class="ph-orb -bottom-40 left-10 h-72 w-72 opacity-60"></div>
    <div class="relative mx-auto max-w-7xl">
        <span class="ph-badge"><span class="h-1.5 w-1.5 rounded-full bg-sky-300"></span>Hasil Kolaborasi</span>
        <h1 class="ph-title mt-6 max-w-3xl text-4xl font-extrabold leading-[1.05] tracking-tight sm:text-6xl">Ide yang jadi <span class="ph-grad">karya nyata.</span></h1>
        <p class="ph-text mt-6 max-w-2xl text-lg leading-8">Beberapa cerita tentang bagaimana teknologi membantu bisnis dan komunitas bergerak lebih jauh.</p>
        <div class="mt-10 flex flex-wrap gap-4">
            <div class="ph-chip px-6 py-4"><div class="text-3xl font-extrabold text-sky-300">{{ $portfolios->total() }}+</div><div class="ph-text mt-1 text-xs font-semibold uppercase tracking-wider">Karya kolaborasi</div></div>
            <div class="ph-chip px-6 py-4"><div class="text-3xl font-extrabold text-sky-300">4</div><div class="ph-text mt-1 text-xs font-semibold uppercase tracking-wider">Pilar solusi</div></div>
        </div>
    </div>
</section>

{{-- Daftar --}}
<section class="relative overflow-hidden bg-slate-50 px-5 py-16 sm:py-20">
    <div class="soft-grid absolute inset-0 opacity-70"></div>
    <div class="absolute -left-24 top-40 h-72 w-72 rounded-full bg-sky-200/40 blur-3xl"></div>
    <div class="relative mx-auto max-w-7xl">
        <div class="mb-10 flex flex-wrap items-end justify-between gap-4">
            <div>
                <p class="section-kicker">Karya Terbaru</p>
                <h2 class="section-heading mt-2 text-3xl sm:text-4xl">Proyek pilihan kami</h2>
            </div>
            <p class="text-sm text-slate-500">Menampilkan {{ $portfolios->count() }} dari {{ $portfolios->total() }} karya</p>
        </div>

        <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($portfolios as $i => $p)
                @php $img = $resolveImg($p); @endphp
                <article data-reveal class="glass-card group flex flex-col rounded-3xl">
                    <a class="pf-cover image-shine bg-gradient-to-br {{ $grads[$i % count($grads)] }}" href="{{ route('portfolio',$p) }}" aria-label="{{ $p->title }}">
                        @if($img)
                            <img loading="lazy" class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-105" src="{{ $img }}" alt="{{ $p->title }}">
                        @else
                            <span class="pf-fallback text-3xl leading-tight drop-shadow-lg sm:text-4xl">{{ $p->client_name }}</span>
                        @endif
                        <span class="absolute left-4 top-4 z-10 rounded-full bg-white/90 px-3 py-1 text-[11px] font-extrabold uppercase tracking-wider text-sky-800 shadow">{{ $p->product->name ?? 'Proyek' }}</span>
                    </a>
                    <div class="flex flex-1 flex-col p-6">
                        <p class="text-xs font-bold uppercase tracking-widest text-sky-600">{{ $p->client_name }}</p>
                        <h3 class="mt-2 text-xl font-extrabold leading-snug text-slate-900">{{ $p->title }}</h3>
                        <p class="mt-3 flex-1 text-sm leading-6 text-slate-600">{{ \Illuminate\Support\Str::limit($p->description,110) }}</p>
                        <div class="mt-5 flex items-center justify-between border-t border-slate-200 pt-4">
                            <span class="text-sm font-extrabold text-sky-700">Lihat cerita</span>
                            <span class="pf-arrow">→</span>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-3xl border border-dashed border-slate-300 bg-white p-12 text-center text-slate-500">Portofolio segera ditambahkan.</div>
            @endforelse
        </div>
        <div class="mt-10">{{ $portfolios->links() }}</div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-white px-5 py-16">
    <div class="page-hero mx-auto max-w-6xl rounded-3xl p-10 text-center md:p-14">
        <h2 class="ph-title text-2xl font-extrabold md:text-4xl">Punya ide untuk <span class="ph-grad">diwujudkan?</span></h2>
        <p class="ph-text mx-auto mt-4 max-w-xl">Ceritakan kebutuhan Anda, dan jadilah karya berikutnya di portofolio kami.</p>
        <a href="{{ route('contact') }}" class="mt-8 inline-flex rounded-2xl bg-sky-400 px-7 py-3.5 font-extrabold !text-slate-950 shadow-lg shadow-sky-500/30 transition hover:-translate-y-0.5 hover:bg-sky-300">Mulai Diskusi →</a>
    </div>
</section>
@endsection
