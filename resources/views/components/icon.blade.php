@props(['name', 'class' => 'h-6 w-6'])

<svg {{ $attributes->merge(['class' => $class]) }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    @switch($name)
        @case('layanan-it-digital')
        @case('web-development')
        @case('laptop')
            <rect x="3" y="4" width="18" height="13" rx="2"/><path d="M2 21h20M8 17l-1 4m9-4 1 4"/><path d="m9 10 2 2 4-4"/>
            @break
        @case('ritel-hardware')
        @case('box')
            <path d="m12 3 9 5-9 5-9-5 9-5Z"/><path d="m3 8 9 5 9-5v9l-9 5-9-5V8Z"/><path d="M12 13v9m-4-12 9-5"/>
            @break
        @case('inovasi-interaktif')
        @case('qrcode')
        @case('qr-code')
            <path d="M4 4h6v6H4zM14 4h6v6h-6zM4 14h6v6H4z"/><path d="M14 14h2v2h-2zm4 0h2m-6 4h2m2 0v2m2-4v4"/>
            @break
        @case('edukasi-teknologi')
        @case('chalkboard-user')
        @case('academic-cap')
            <path d="m2 9 10-5 10 5-10 5L2 9Z"/><path d="M6 11v5c3 3 9 3 12 0v-5m4-2v7"/><circle cx="22" cy="18" r="1"/>
            @break
        @case('briefcase')
            <rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18m-11 0v2h4v-2"/>
            @break
        @case('store')
            <path d="M3 10v10h18V10M2 10l2-7h16l2 7M2 10a3 3 0 0 0 6 0 3 3 0 0 0 6 0 3 3 0 0 0 6 0 2 2 0 0 0 4 0M9 20v-6h6v6"/>
            @break
        @case('school')
            <path d="m3 9 9-5 9 5-9 5-9-5Z"/><path d="M6 11v5c3 2.5 9 2.5 12 0v-5M21 9v7"/>
            @break
        @case('users')
            <circle cx="9" cy="8" r="3"/><path d="M3 20v-1a6 6 0 0 1 12 0v1H3Zm13-9a3 3 0 1 0-1-5.8M18 14a5 5 0 0 1 3 5v1h-3"/>
            @break
        @case('calendar')
            <rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18m-13 4h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01"/>
            @break
        @case('pin')
            <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/>
            @break
        @case('arrow-up-right')
            <path d="M7 17 17 7M7 7h10v10"/>
            @break
        @case('sparkles')
            <path d="m12 3 1.9 5.8L20 11l-6.1 2.2L12 19l-2-5.8L4 11l6-2.2L12 3Z"/><path d="m19 14 1.2 2.8L23 18l-2.8 1.1L19 22l-1.1-2.9L15 18l2.9-1.2L19 14ZM5 2l.8 2.2L8 5l-2.2.8L5 8l-.8-2.2L2 5l2.2-.8L5 2Z"/>
            @break
        @case('moon')
            <path d="M20.7 13A8.5 8.5 0 0 1 11 3.3 8.5 8.5 0 1 0 20.7 13Z"/>
            @break
        @default
            <circle cx="12" cy="12" r="8"/><path d="M12 8v8m-4-4h8"/>
    @endswitch
</svg>
