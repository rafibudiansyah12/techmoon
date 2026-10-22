<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','TechMoon — Menjembatani Inovasi')</title>
    <meta name="description" content="@yield('description','Ekosistem teknologi inklusif untuk bisnis, UMKM, dan pendidikan.')">
    <meta property="og:title" content="@yield('title','TechMoon — Menjembatani Inovasi')">
    <meta property="og:description" content="Menjembatani Inovasi">
    <meta name="theme-color" content="#080f20">
    <script>(()=>{try{const saved=localStorage.getItem('techmoon-theme');const dark=saved?saved==='dark':matchMedia('(prefers-color-scheme: dark)').matches;document.documentElement.dataset.theme=dark?'dark':'light';document.documentElement.classList.toggle('dark',dark)}catch(e){document.documentElement.dataset.theme='light'}})()</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <header class="site-nav sticky top-0 z-50 border-b border-white/70 bg-white/80 backdrop-blur-2xl dark:border-white/10 dark:bg-slate-950/80">
        <nav x-data="siteTheme" @keydown.escape.window="menuOpen=false" class="relative mx-auto flex min-h-[76px] max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}" class="group flex shrink-0 items-center gap-2.5" aria-label="TechMoon, beranda">
                <span class="brand-mark relative grid h-10 w-10 place-items-center overflow-hidden rounded-2xl text-sky-300 shadow-lg transition duration-300 group-hover:-rotate-6 group-hover:scale-105"><x-icon name="moon" class="h-5 w-5"/><span class="absolute right-2 top-1 text-[9px] text-sky-100">✦</span></span>
                <span class="text-lg font-extrabold tracking-tight text-slate-950 dark:text-white sm:text-xl">Tech<span class="text-sky-600 dark:text-sky-400">Moon</span></span>
            </a>

            <div class="hidden items-center gap-1 lg:flex">
                <a href="{{ route('home') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('home')])>Beranda</a>
                <a href="{{ route('products') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('products','product')])>Layanan & Produk</a>
                <a href="{{ route('portfolios') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('portfolios','portfolio')])>Portofolio</a>
                <a href="{{ route('events') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('events','event')])>Event</a>
                <a href="{{ route('about') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('about')])>Tentang</a>
            </div>

            <div class="hidden items-center gap-2 lg:flex">
                <button type="button" @click="toggleTheme" class="theme-toggle" :aria-label="dark ? 'Aktifkan mode terang' : 'Aktifkan mode gelap'" :title="dark ? 'Mode terang' : 'Mode gelap'">
                    <svg x-show="!dark" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><circle cx="12" cy="12" r="4"/><path stroke-linecap="round" d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"/></svg>
                    <svg x-show="dark" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M20.9 13A8.5 8.5 0 0 1 11 3.1 8.5 8.5 0 1 0 20.9 13Z"/></svg>
                </button>
                <a href="{{ route('contact') }}" class="nav-cta group">Minta Penawaran <x-icon name="arrow-up-right" class="ml-1 h-4 w-4 transition group-hover:translate-x-0.5 group-hover:-translate-y-0.5"/></a>
            </div>

            <div class="flex items-center gap-2 lg:hidden">
                <button type="button" @click="toggleTheme" class="theme-toggle" :aria-label="dark ? 'Aktifkan mode terang' : 'Aktifkan mode gelap'" title="Ganti tema">
                    <svg x-show="!dark" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><circle cx="12" cy="12" r="4"/><path stroke-linecap="round" d="M12 2v2m0 16v2M2 12h2m16 0h2"/></svg>
                    <svg x-show="dark" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M20.9 13A8.5 8.5 0 0 1 11 3.1 8.5 8.5 0 1 0 20.9 13Z"/></svg>
                </button>
                <button type="button" @click="menuOpen=!menuOpen" :aria-expanded="menuOpen.toString()" aria-controls="mobile-navigation" :aria-label="menuOpen ? 'Tutup menu' : 'Buka menu'" class="menu-toggle">
                    <svg x-show="!menuOpen" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/></svg>
                    <svg x-show="menuOpen" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><path stroke-linecap="round" d="m6 6 12 12M18 6 6 18"/></svg>
                </button>
            </div>

            <div id="mobile-navigation" x-cloak x-show="menuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" @click.outside="menuOpen=false" class="mobile-menu absolute inset-x-3 top-[calc(100%-2px)] rounded-3xl border border-slate-200/80 bg-white/95 p-3 shadow-2xl shadow-slate-900/15 backdrop-blur-2xl dark:border-white/10 dark:bg-slate-900/95 lg:hidden">
                <a href="{{ route('home') }}" @class(['mobile-nav-link', 'mobile-nav-active' => request()->routeIs('home')])>Beranda <span>01</span></a>
                <a href="{{ route('products') }}" @class(['mobile-nav-link', 'mobile-nav-active' => request()->routeIs('products','product')])>Layanan & Produk <span>02</span></a>
                <a href="{{ route('portfolios') }}" @class(['mobile-nav-link', 'mobile-nav-active' => request()->routeIs('portfolios','portfolio')])>Portofolio <span>03</span></a>
                <a href="{{ route('events') }}" @class(['mobile-nav-link', 'mobile-nav-active' => request()->routeIs('events','event')])>Event <span>04</span></a>
                <a href="{{ route('about') }}" @class(['mobile-nav-link', 'mobile-nav-active' => request()->routeIs('about')])>Tentang <span>05</span></a>
                <a href="{{ route('contact') }}" class="nav-cta mt-2 flex w-full justify-center">Minta Penawaran <x-icon name="arrow-up-right" class="ml-2 h-4 w-4"/></a>
            </div>
        </nav>
    </header>

    <main>
        @if(session('success'))<div role="status" class="mx-auto mt-5 max-w-6xl rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800 shadow-sm dark:border-emerald-900/60 dark:bg-emerald-950/60 dark:text-emerald-200">{{ session('success') }}</div>@endif
        @yield('content')
    </main>
    <footer class="site-footer">
        <div class="footer-topline"></div>
        <div class="mx-auto grid max-w-7xl gap-10 px-5 py-14 sm:px-6 md:grid-cols-2 lg:grid-cols-[1.25fr_.75fr_.85fr_1fr] lg:gap-12 lg:px-8 lg:py-16">
            <div><a class="inline-flex items-center gap-3 text-xl font-extrabold text-white" href="{{ route('home') }}"><span class="footer-brand-mark grid h-11 w-11 place-items-center rounded-2xl">TM</span><span>TechMoon</span></a><p class="mt-5 text-sm font-bold text-sky-300">Menjembatani Inovasi</p><p class="mt-3 max-w-sm text-sm leading-7 text-slate-400">Ekosistem teknologi inklusif yang membantu bisnis, pendidikan, dan masyarakat berkembang bersama.</p></div>
            <div><h2 class="footer-heading">Jelajahi</h2><div class="mt-5 grid gap-3 text-sm"><a class="footer-link" href="{{ route('products') }}">Layanan & Produk</a><a class="footer-link" href="{{ route('portfolios') }}">Portofolio</a><a class="footer-link" href="{{ route('events') }}">Event & Edukasi</a><a class="footer-link" href="{{ route('about') }}">Tentang Kami</a></div></div>
            <div><h2 class="footer-heading">Empat pilar</h2><div class="mt-5 grid gap-3 text-sm"><span class="footer-muted">Layanan IT & Digital</span><span class="footer-muted">Ritel Hardware</span><span class="footer-muted">Inovasi Interaktif</span><span class="footer-muted">Edukasi Teknologi</span></div></div>
            <div><h2 class="footer-heading">Mulai diskusi</h2><p class="mt-5 text-sm leading-7 text-slate-400">Punya ide atau kebutuhan teknologi? Kami siap bantu merancang langkah berikutnya.</p><a class="footer-contact group mt-5 inline-flex items-center gap-2 rounded-xl px-4 py-3 text-sm font-bold" href="{{ route('contact') }}">Hubungi TechMoon <x-icon name="arrow-up-right" class="h-4 w-4 transition group-hover:translate-x-0.5 group-hover:-translate-y-0.5"/></a><p class="mt-5 text-xs text-slate-500">Respon langsung dari tim kami.</p></div>
        </div>
        <div class="footer-divider"></div><div class="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-5 text-xs text-slate-500 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8"><span>&copy; {{ date('Y') }} TechMoon. Menjembatani Inovasi.</span><span>Dibangun dengan ide, teknologi, dan kolaborasi.</span></div>
    </footer>
    <a aria-label="WhatsApp TechMoon" class="whatsapp-float fixed bottom-5 right-5 z-40 inline-flex items-center gap-2 rounded-full border border-white/30 bg-emerald-500 px-4 py-3 font-bold text-white shadow-xl shadow-emerald-950/20 transition hover:-translate-y-1 hover:bg-emerald-600 sm:px-5" href="https://wa.me/{{ preg_replace('/\D/','',config('services.whatsapp_number','6281234567890')) }}"><svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5" aria-hidden="true"><path d="M20.5 3.5A11.8 11.8 0 0 0 12.1 0C5.6 0 .3 5.3.3 11.8c0 2.1.5 4.1 1.6 5.9L0 24l6.5-1.7a11.8 11.8 0 0 0 5.6 1.4h.1c6.5 0 11.8-5.3 11.8-11.8 0-3.2-1.2-6.1-3.5-8.4ZM12.1 21.7a9.8 9.8 0 0 1-5-1.4l-.4-.2-3.9 1 1-3.8-.3-.4a9.8 9.8 0 1 1 8.6 4.8Zm5.4-7.3c-.3-.1-1.7-.8-2-.9-.3-.1-.5-.1-.7.2-.2.3-.8.9-.9 1.1-.2.2-.3.2-.6.1-.3-.1-1.2-.4-2.3-1.4-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.4.1-.6l.4-.5.3-.5c.1-.2 0-.4 0-.5l-.9-2.1c-.2-.5-.5-.4-.7-.4h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.4s1 2.7 1.1 2.9c.1.2 2 3 4.8 4.2.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.6.2-1.1.2-1.3-.1-.2-.3-.3-.6-.4Z"/></svg><span class="hidden sm:inline">WhatsApp</span></a>
</body>
</html>
