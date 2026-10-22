<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Admin TechMoon')</title><meta name="theme-color" content="#080f20">
    <script>(()=>{try{const saved=localStorage.getItem('techmoon-theme');const dark=saved?saved==='dark':matchMedia('(prefers-color-scheme: dark)').matches;document.documentElement.dataset.theme=dark?'dark':'light';document.documentElement.classList.toggle('dark',dark)}catch(e){document.documentElement.dataset.theme='light'}})()</script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-700 antialiased">
    <header class="site-nav sticky top-0 z-50 border-b border-white/10 bg-slate-950 text-white shadow-xl shadow-slate-950/10">
        <nav x-data="siteTheme" @keydown.escape.window="menuOpen=false" class="relative mx-auto flex min-h-[72px] max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
            <a class="flex shrink-0 items-center gap-3" href="{{ route('admin.dashboard') }}"><span class="grid h-10 w-10 place-items-center rounded-2xl border border-sky-300/20 bg-sky-300/10 text-lg text-sky-300">☾</span><span><b class="block text-sm font-extrabold tracking-wide text-white">TechMoon</b><span class="block text-[10px] font-bold uppercase tracking-[.18em] text-slate-400">Workspace Admin</span></span></a>
            <div class="hidden items-center gap-1 lg:flex">
                <a href="{{ route('admin.dashboard') }}" @class(['nav-link !text-slate-300 hover:!text-white', 'nav-link-active !bg-white/10 !text-sky-200' => request()->routeIs('admin.dashboard')])>Dashboard</a>
                <a href="{{ route('admin.inquiries.index') }}" @class(['nav-link !text-slate-300 hover:!text-white', 'nav-link-active !bg-white/10 !text-sky-200' => request()->routeIs('admin.inquiries.*')])>Inquiry</a>
                @foreach(['products'=>'Produk','events'=>'Event','portfolios'=>'Portofolio','testimonials'=>'Testimoni'] as $type=>$label)
                    <a href="{{ route('admin.content.index',$type) }}" @class(['nav-link !text-slate-300 hover:!text-white', 'nav-link-active !bg-white/10 !text-sky-200' => request()->routeIs('admin.content.*') && request()->route('type')===$type])>{{ $label }}</a>
                @endforeach
            </div>
            <div class="hidden items-center gap-2 lg:flex"><button type="button" @click="toggleTheme" class="theme-toggle !border-white/10 !bg-white/[.06] !text-sky-100 hover:!bg-white/10" :aria-label="dark ? 'Aktifkan mode terang' : 'Aktifkan mode gelap'" title="Ganti tema"><svg x-show="!dark" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><circle cx="12" cy="12" r="4"/><path stroke-linecap="round" d="M12 2v2m0 16v2M2 12h2m16 0h2"/></svg><svg x-show="dark" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M20.9 13A8.5 8.5 0 0 1 11 3.1 8.5 8.5 0 1 0 20.9 13Z"/></svg></button><form method="post" action="{{ route('logout') }}">@csrf<button class="rounded-full border border-white/10 px-4 py-2 text-xs font-bold text-slate-300 transition hover:border-rose-300/30 hover:bg-rose-400/10 hover:text-rose-200">Keluar</button></form></div>
            <div class="flex items-center gap-2 lg:hidden"><button type="button" @click="toggleTheme" class="theme-toggle !border-white/10 !bg-white/[.06] !text-sky-100" aria-label="Ganti tema"><svg x-show="!dark" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><circle cx="12" cy="12" r="4"/><path stroke-linecap="round" d="M12 2v2m0 16v2M2 12h2m16 0h2"/></svg><svg x-show="dark" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M20.9 13A8.5 8.5 0 0 1 11 3.1 8.5 8.5 0 1 0 20.9 13Z"/></svg></button><button type="button" @click="menuOpen=!menuOpen" :aria-expanded="menuOpen.toString()" aria-controls="admin-mobile-navigation" aria-label="Buka menu admin" class="menu-toggle !border-white/10 !bg-white/[.06] !text-white"><svg x-show="!menuOpen" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/></svg><svg x-show="menuOpen" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><path stroke-linecap="round" d="m6 6 12 12M18 6 6 18"/></svg></button></div>
            <div id="admin-mobile-navigation" x-cloak x-show="menuOpen" x-transition class="mobile-menu absolute inset-x-3 top-[calc(100%-2px)] rounded-3xl border border-white/10 bg-slate-900 p-3 shadow-2xl shadow-black/40 lg:hidden">
                <a href="{{ route('admin.dashboard') }}" class="mobile-nav-link !text-slate-200">Dashboard</a><a href="{{ route('admin.inquiries.index') }}" class="mobile-nav-link !text-slate-200">Inquiry</a>
                @foreach(['products'=>'Produk','events'=>'Event','portfolios'=>'Portofolio','testimonials'=>'Testimoni'] as $type=>$label)<a href="{{ route('admin.content.index',$type) }}" class="mobile-nav-link !text-slate-200">{{ $label }}</a>@endforeach
                <form method="post" action="{{ route('logout') }}" class="mt-2 border-t border-white/10 pt-2">@csrf<button class="w-full rounded-2xl px-4 py-3 text-left text-sm font-bold text-rose-200 hover:bg-rose-400/10">Keluar dari admin</button></form>
            </div>
        </nav>
    </header>
    <main class="mx-auto max-w-7xl px-4 py-7 sm:px-6 sm:py-9 lg:px-8">
        @if(session('success'))<div role="status" class="mb-5 rounded-2xl border border-emerald-200 bg-emerald-100 p-4 text-emerald-800 shadow-sm dark:border-emerald-900/60 dark:bg-emerald-950/60 dark:text-emerald-200">{{ session('success') }}</div>@endif
        @yield('content')
    </main>
</body>
</html>
