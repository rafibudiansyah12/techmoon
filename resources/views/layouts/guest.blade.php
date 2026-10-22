<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk Admin — TechMoon</title>
    <script>(()=>{try{const saved=localStorage.getItem('techmoon-theme');const dark=saved?saved==='dark':matchMedia('(prefers-color-scheme: dark)').matches;document.documentElement.dataset.theme=dark?'dark':'light';document.documentElement.classList.toggle('dark',dark)}catch(e){document.documentElement.dataset.theme='light'}})()</script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 font-sans text-gray-900 antialiased">
    <div class="fixed right-5 top-5 z-20" x-data="siteTheme"><button type="button" @click="toggleTheme" class="theme-toggle" :aria-label="dark ? 'Aktifkan mode terang' : 'Aktifkan mode gelap'"><svg x-show="!dark" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><circle cx="12" cy="12" r="4"/><path stroke-linecap="round" d="M12 2v2m0 16v2M2 12h2m16 0h2"/></svg><svg x-show="dark" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M20.9 13A8.5 8.5 0 0 1 11 3.1 8.5 8.5 0 1 0 20.9 13Z"/></svg></button></div>
    <div class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden px-5 py-12 sm:px-0">
        <div class="absolute -left-28 top-10 h-80 w-80 rounded-full bg-sky-300/20 blur-3xl dark:bg-sky-500/10"></div><div class="absolute -bottom-32 -right-20 h-96 w-96 rounded-full bg-indigo-300/20 blur-3xl dark:bg-indigo-500/10"></div>
        <div class="relative z-10"><a href="/" class="flex items-center gap-3"><span class="grid h-12 w-12 place-items-center rounded-2xl bg-slate-950 text-xl text-sky-300 shadow-xl">☾</span><span><b class="block text-lg font-extrabold text-slate-900 dark:text-white">TechMoon</b><span class="text-[10px] font-bold uppercase tracking-[.18em] text-slate-500 dark:text-slate-400">Admin workspace</span></span></a></div>
        <div class="relative z-10 mt-7 w-full overflow-hidden rounded-3xl border border-white/70 bg-white/90 px-6 py-7 shadow-[0_25px_80px_rgba(15,23,42,.12)] backdrop-blur-xl dark:border-white/10 dark:bg-slate-900/90 sm:max-w-md sm:px-8">{{ $slot }}</div>
    </div>
</body>
</html>
