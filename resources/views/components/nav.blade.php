@php
    /**
     * Keep navigation in one place.
     * You can move this to config/navigation.php later if you want.
     */
    $nav = [
        ['label' => 'Welcome', 'href' => route('welcome'), 'active' => request()->routeIs('welcome')],
        ['label' => 'Counter',  'href' => route('counter'), 'active' => request()->routeIs('counter')],
    ];
@endphp

<nav class="border-b border-gray-200 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center gap-8">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 font-semibold text-gray-900">
                    <span class="grid size-8 place-items-center rounded-lg bg-gray-900 text-white text-sm">BT</span>
                    <span>Docker Test</span>
                </a>

                <div class="hidden md:flex md:items-center md:gap-1">
                    @foreach ($nav as $item)
                        <a
                            href="{{ $item['href'] }}"
                            @class([
                                'rounded-md px-3 py-2 text-sm font-medium transition',
                                'text-gray-900 bg-gray-100' => $item['active'],
                                'text-gray-600 hover:text-gray-900 hover:bg-gray-50' => ! $item['active'],
                            ])
                        >
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a
                    href="#"
                    class="hidden sm:inline-flex rounded-md px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50"
                >
                    Profile
                </a>

                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-900 md:hidden"
                    aria-controls="mobile-menu"
                    aria-expanded="false"
                    data-nav-toggle
                >
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="md:hidden hidden border-t border-gray-200 bg-white">
        <div class="space-y-1 px-4 py-3">
            @foreach ($nav as $item)
                <a
                    href="{{ $item['href'] }}"
                    @class([
                        'block rounded-md px-3 py-2 text-base font-medium transition',
                        'text-gray-900 bg-gray-100' => $item['active'],
                        'text-gray-600 hover:text-gray-900 hover:bg-gray-50' => ! $item['active'],
                    ])
                >
                    {{ $item['label'] }}
                </a>
            @endforeach

            <div class="pt-2">
                <a
                    href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50"
                >
                    Profile
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    (() => {
        const btn = document.querySelector('[data-nav-toggle]');
        const menu = document.getElementById('mobile-menu');
        if (!btn || !menu) return;

        btn.addEventListener('click', () => {
            const isHidden = menu.classList.contains('hidden');
            menu.classList.toggle('hidden', !isHidden);
            btn.setAttribute('aria-expanded', String(isHidden));
        });

        window.addEventListener('resize', () => {
            if (window.matchMedia('(min-width: 768px)').matches) {
                menu.classList.add('hidden');
                btn.setAttribute('aria-expanded', 'false');
            }
        });
    })();
</script>
