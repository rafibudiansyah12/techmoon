@props(['event'])

<article data-reveal data-spotlight class="glass-card spotlight group rounded-3xl p-6 sm:p-7">
    <div class="flex items-start justify-between"><span class="eyebrow !border-sky-200 !bg-sky-50 !text-sky-700">{{ ucfirst($event->type) }}</span><span class="icon-tile !h-11 !w-11 !rounded-2xl transition group-hover:-rotate-3 group-hover:scale-105"><x-icon name="calendar" class="h-5 w-5"/></span></div>
    <h3 class="mt-6 text-xl font-extrabold leading-snug text-slate-900"><a class="transition group-hover:text-sky-700" href="{{ route('event',$event) }}">{{ $event->title }}</a></h3>
    <p class="mt-3 line-clamp-2 min-h-12 text-sm leading-6 text-slate-500">{{ $event->description }}</p>
    <div class="mt-5 space-y-2 border-t border-slate-100 pt-5 text-sm text-slate-600"><p class="flex items-center gap-2"><x-icon name="calendar" class="h-4 w-4 shrink-0 text-sky-600"/>{{ $event->start_at->translatedFormat('d F Y, H:i') }}</p><p class="flex items-center gap-2"><x-icon name="pin" class="h-4 w-4 shrink-0 text-sky-600"/>{{ $event->location }}</p></div>
    <div class="mt-5 flex items-center justify-between"><span class="event-quota rounded-full px-3 py-1.5 text-xs font-bold">{{ max(0,$event->quota-($event->reserved_count ?? 0)) }} kursi tersisa</span><a class="event-arrow grid h-10 w-10 place-items-center rounded-xl text-white transition group-hover:-translate-y-0.5" href="{{ route('event',$event) }}" aria-label="Lihat {{ $event->title }}"><x-icon name="arrow-up-right" class="h-5 w-5"/></a></div>
</article>
