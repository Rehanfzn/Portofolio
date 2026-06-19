@props(['experience'])

<section id="experience" class="py-24 sm:py-32 scroll-mt-24">
    <div class="max-w-3xl mx-auto px-6">
        <div class="mb-16 reveal opacity-0">
            <span class="section-label">Experience</span>
            <h2 class="section-title mt-2">Where I've <span class="text-indigo-600 dark:text-indigo-400">Worked</span></h2>
        </div>

        <div class="space-y-12">
            @foreach ($experience as $index => $item)
            <div class="reveal opacity-0 relative pl-8 border-l border-zinc-200 dark:border-zinc-800" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="absolute left-0 top-1 -translate-x-1/2 w-3 h-3 rounded-full bg-zinc-300 dark:bg-zinc-600 border-2 border-zinc-50 dark:border-zinc-950"></div>

                <div class="text-xs font-mono text-zinc-400 dark:text-zinc-500 mb-1">
                    {{ $item['date'] }}
                </div>

                <h3 class="text-base font-bold text-zinc-900 dark:text-zinc-50">
                    {{ $item['title'] }}
                </h3>

                <p class="text-sm text-indigo-600 dark:text-indigo-400 font-medium mt-0.5">
                    {{ $item['subtitle'] }}
                </p>

                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-2 leading-relaxed max-w-xl">
                    {{ $item['desc'] }}
                </p>

                @if (!empty($item['tags']))
                <div class="flex flex-wrap gap-1.5 mt-3">
                    @foreach ($item['tags'] as $tag)
                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 font-mono border border-zinc-200 dark:border-zinc-700">{{ $tag }}</span>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
