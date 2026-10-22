@extends('layouts.public')
@section('title','Tentang TechMoon')
@section('content')
@php
    $ceo = ['name' => 'Fahri Andriansyah', 'role' => 'CEO', 'desc' => 'Memimpin arah strategis dan visi TechMoon sebagai ekosistem teknologi inklusif.'];
    $team = [
        ['role' => 'Produksi', 'name' => 'Rafi Budiansyah', 'desc' => 'Mengelola pengembangan produk dan kualitas hasil kerja.'],
        ['role' => 'Keuangan', 'name' => 'Irgi Nur Arasyid', 'desc' => 'Mengatur keuangan, anggaran, dan pelaporan perusahaan.'],
        ['role' => 'Marketing', 'name' => 'Nur Hidayatullah', 'desc' => 'Membangun brand, promosi, dan hubungan dengan pelanggan.'],
        ['role' => 'Human Resource', 'name' => 'Adventias Lasroha', 'desc' => 'Menjaga talenta, budaya kerja, dan perkembangan tim.'],
        ['role' => 'Operasional', 'name' => 'Ikmal Ardiansyah', 'desc' => 'Memastikan seluruh proses berjalan lancar setiap hari.'],
    ];
    $initials = fn($n) => collect(explode(' ', $n))->take(2)->map(fn($w) => strtoupper(substr($w, 0, 1)))->implode('');
@endphp

{{-- Intro --}}
<section class="relative overflow-hidden bg-slate-50 px-5 py-20 sm:py-24">
    <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-sky-200/50 blur-3xl"></div>
    <div class="relative mx-auto max-w-4xl text-center">
        <p class="section-kicker">Tentang Kami</p>
        <h1 class="section-heading mt-3 text-4xl sm:text-5xl">Mengenal TechMoon</h1>
        <p class="mx-auto mt-6 max-w-3xl text-lg leading-8 text-slate-600">TechMoon adalah ekosistem teknologi inklusif yang berkomitmen menjembatani inovasi agar dapat dinikmati bisnis, institusi, dan masyarakat luas.</p>
    </div>
</section>

{{-- Visi & Misi --}}
<section class="bg-white px-5 py-16 sm:py-20">
    <div class="mx-auto grid max-w-6xl gap-6 md:grid-cols-2">
        <article class="glass-card group rounded-3xl p-8">
            <div class="icon-tile"><svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg></div>
            <h2 class="mt-5 text-2xl font-bold text-slate-900">Visi</h2>
            <p class="mt-3 leading-7 text-slate-600">Menjadi mitra teknologi inklusif yang membantu setiap potensi berkembang.</p>
        </article>
        <article class="glass-card group rounded-3xl p-8">
            <div class="icon-tile"><svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V4s-1 1-4 1-5-2-8-2-4 1-4 1zM4 22V15"/></svg></div>
            <h2 class="mt-5 text-2xl font-bold text-slate-900">Misi</h2>
            <p class="mt-3 leading-7 text-slate-600">Menghubungkan layanan digital, perangkat, inovasi interaktif, dan edukasi teknologi dalam solusi yang mudah diakses.</p>
        </article>
    </div>
</section>

{{-- Struktur Tim --}}
<section class="bg-slate-50 px-5 py-16 sm:py-20">
    <div class="mx-auto max-w-6xl">
        <div class="text-center">
            <p class="section-kicker">Tim Kami</p>
            <h2 class="section-heading mt-3 text-3xl sm:text-4xl">Struktur Tim</h2>
        </div>

        {{-- CEO --}}
        <div class="mx-auto mt-12 max-w-sm">
            <div class="glass-card rounded-3xl border-t-4 !border-t-sky-500 p-7 text-center">
                <div class="mx-auto grid h-24 w-24 place-items-center rounded-full bg-gradient-to-br from-sky-500 to-indigo-600 text-3xl font-extrabold text-white ring-4 ring-sky-100">{{ $initials($ceo['name']) }}</div>
                <span class="mt-5 inline-block rounded-full bg-sky-600 px-4 py-1 text-xs font-bold uppercase tracking-widest text-white">{{ $ceo['role'] }}</span>
                <h3 class="mt-3 text-xl font-bold text-slate-900">{{ $ceo['name'] }}</h3>
                <p class="mt-2 text-sm leading-6 text-slate-600">{{ $ceo['desc'] }}</p>
            </div>
        </div>

        {{-- Konektor --}}
        <div class="mx-auto h-10 w-px bg-sky-400"></div>
        <div class="mx-auto hidden h-px w-[80%] bg-sky-400 lg:block"></div>

        {{-- Anggota --}}
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-5 lg:pt-0">
            @foreach($team as $m)
                <div class="relative">
                    <div class="mx-auto hidden h-6 w-px bg-sky-400 lg:block"></div>
                    <div class="glass-card h-full rounded-3xl p-6 text-center">
                        <div class="mx-auto grid h-20 w-20 place-items-center rounded-full bg-gradient-to-br from-sky-400 to-cyan-600 text-2xl font-extrabold text-white ring-4 ring-sky-100">{{ $initials($m['name']) }}</div>
                        <span class="mt-4 inline-block rounded-full bg-sky-100 px-3 py-1 text-[11px] font-bold uppercase tracking-wider text-sky-800">{{ $m['role'] }}</span>
                        <h3 class="mt-3 font-bold text-slate-900">{{ $m['name'] }}</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">{{ $m['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Empat Pilar --}}
<section class="bg-white px-5 py-16 sm:py-20">
    <div class="mx-auto max-w-6xl">
        <div class="text-center">
            <p class="section-kicker">Fondasi Kami</p>
            <h2 class="section-heading mt-3 text-3xl sm:text-4xl">Empat Pilar</h2>
        </div>
        <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($pillars as $i => $p)
                <div class="glass-card rounded-3xl p-6">
                    <div class="text-4xl font-extrabold text-sky-500">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    <h3 class="mt-3 text-lg font-bold text-slate-900">{{ $p->name }}</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">{{ $p->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-slate-50 px-5 pb-20">
    <div class="mx-auto max-w-6xl rounded-3xl bg-sky-600 p-10 text-center md:p-14">
        <h2 class="text-2xl font-extrabold text-white md:text-3xl">Siap berkolaborasi bersama TechMoon?</h2>
        <p class="mx-auto mt-3 max-w-xl text-sky-50">Ceritakan kebutuhan Anda dan mari wujudkan solusi teknologi yang tepat.</p>
        <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-2xl bg-white px-6 py-3 font-extrabold !text-sky-700 shadow-lg transition hover:-translate-y-0.5">Hubungi Kami</a>
    </div>
</section>
@endsection
