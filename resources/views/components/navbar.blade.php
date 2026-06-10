@props(['navigation'])

<nav x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 40, { passive: true })"
    class="fixed top-4 left-1/2 -translate-x-1/2 z-50 w-full px-4 transition-all duration-300"
    :class="scrolled ? 'top-3' : 'top-4'">
    <div class="mx-auto transition-all duration-300"
        :class="scrolled ? 'max-w-xl' : 'max-w-5xl'">
        <div class="flex items-center justify-between transition-all duration-300 rounded-full bg-zinc-50/90 dark:bg-zinc-950/90 backdrop-blur-xl border border-zinc-200/60 dark:border-zinc-800/60 shadow-lg shadow-zinc-900/5"
            :class="scrolled ? 'h-11 px-3' : 'h-14 px-5'">

            <a href="#home"
                class="text-base font-bold text-zinc-900 dark:text-zinc-50 tracking-tight shrink-0 transition-all duration-300"
                :class="scrolled ? 'text-sm' : 'text-base'">
                {{ $navigation['brand'] }}
                <span class="text-zinc-400 font-mono text-xs">()</span>
            </a>

            <div class="hidden md:flex items-center gap-1 transition-all duration-300"
                :class="scrolled ? 'scale-90' : 'scale-100'">
                @foreach ($navigation['items'] as $item)
                <a href="#{{ $item['id'] }}"
                    class="nav-link text-zinc-400 px-3 py-2 text-sm font-medium transition-colors rounded-full hover:bg-zinc-100 dark:hover:bg-zinc-800">
                    {{ $item['label'] }}
                </a>
                @endforeach
            </div>

            <div class="flex items-center gap-1">
                <button x-data="theme"
                    data-theme-toggle
                    @click="toggle"
                    class="w-8 h-8 rounded-full flex items-center justify-center text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-all shrink-0"
                    aria-label="Toggle theme">
                    <svg x-show="!dark" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                    <svg x-show="dark" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </button>

                <button @click="open = !open"
                    class="md:hidden w-8 h-8 rounded-full flex items-center justify-center text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-all shrink-0">
                    <svg x-show="!open" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-3"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-3"
        @click.outside="open = false"
        class="md:hidden mx-auto mt-2 max-w-xs bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-2xl shadow-lg">
        <div class="flex flex-col p-2">
            @foreach ($navigation['items'] as $item)
            <a href="#{{ $item['id'] }}" @click="open = false"
                class="nav-link px-4 py-2.5 rounded-xl text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 hover:text-zinc-900 dark:hover:text-zinc-100">
                {{ $item['label'] }}
            </a>
            @endforeach
        </div>
    </div>
</nav>
