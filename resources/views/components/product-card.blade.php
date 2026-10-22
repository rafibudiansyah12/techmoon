@props(['product'])

<article data-reveal data-spotlight class="glass-card spotlight group rounded-3xl">
    <a href="{{ route('product',$product->slug) }}" class="image-shine relative block overflow-hidden rounded-t-3xl bg-slate-100">
        <img loading="lazy" class="h-56 w-full object-cover transition duration-700 group-hover:scale-[1.06]" src="{{ $product->image && str_starts_with($product->image,'http') ? $product->image : ($product->image ? Storage::url($product->image) : 'https://placehold.co/800x600/0f172a/38bdf8?text=TechMoon') }}" alt="{{ $product->name }}">
        @if($product->is_featured)<span class="featured-badge absolute left-4 top-4 inline-flex items-center gap-1.5 rounded-full px-3 py-1.5 text-[11px] font-bold"><x-icon name="sparkles" class="h-3.5 w-3.5"/> Unggulan</span>@endif
        <span class="absolute bottom-4 right-4 rounded-full bg-white/90 px-3 py-1.5 text-[11px] font-bold text-slate-700 shadow-lg backdrop-blur">{{ $product->pillar->name ?? 'TechMoon' }}</span>
    </a>
    <div class="relative p-5 sm:p-6">
        <div class="flex items-start justify-between gap-4"><h3 class="text-lg font-extrabold tracking-tight text-slate-900"><a class="transition group-hover:text-sky-700" href="{{ route('product',$product->slug) }}">{{ $product->name }}</a></h3><span class="product-arrow mt-1 grid h-9 w-9 shrink-0 place-items-center rounded-full border border-slate-200 text-slate-400 transition group-hover:-translate-y-0.5 group-hover:border-sky-300 group-hover:bg-sky-50 group-hover:text-sky-700"><x-icon name="arrow-up-right" class="h-4 w-4"/></span></div>
        <p class="mt-2 min-h-12 text-sm leading-6 text-slate-500">{{ \Illuminate\Support\Str::limit($product->description,92) }}</p>
        <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4"><p class="text-sm font-extrabold text-slate-900">@if($product->price_type==='negosiasi')Hubungi kami @else @if($product->price_type==='mulai_dari')<span class="font-medium text-slate-400">Mulai dari </span>@endif Rp {{ number_format($product->price,0,',','.') }}@endif</p><a class="inline-flex items-center gap-1 text-xs font-bold text-sky-700 transition group-hover:gap-2" href="{{ route('product',$product->slug) }}">Lihat detail <span aria-hidden="true">&rarr;</span></a></div>
    </div>
</article>
