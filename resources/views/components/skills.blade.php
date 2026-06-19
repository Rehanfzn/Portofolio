@props(['skills'])

<section id="skills" class="py-24 sm:py-32 bg-zinc-100/50 dark:bg-zinc-900/50 scroll-mt-24">
    <div class="max-w-3xl mx-auto px-6">
        <div class="mb-16 reveal opacity-0">
            <span class="section-label">Skills</span>
            <h2 class="section-title mt-2">Technologies I <span class="text-indigo-600 dark:text-indigo-400">Work With</span></h2>
        </div>

        <div class="space-y-12">
            @foreach ($skills as $catIndex => $category)
            <div class="reveal opacity-0" style="animation-delay: {{ $catIndex * 0.1 }}s">
                <div class="flex items-center gap-4 mb-5">
                    <h3 class="text-xs font-mono text-zinc-500 dark:text-zinc-500 uppercase tracking-wider shrink-0">
                        {{ $category['category'] }}
                    </h3>
                    <span class="h-px flex-1 bg-zinc-200 dark:bg-zinc-800"></span>
                </div>
                <div class="flex flex-wrap gap-2.5">
                    @foreach ($category['items'] as $skill)
                    <span class="group relative pl-3 pr-4 py-2 rounded-xl bg-zinc-100 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 text-sm font-medium text-zinc-700 dark:text-zinc-300 hover:border-indigo-300 dark:hover:border-indigo-700 hover:bg-indigo-50 dark:hover:bg-indigo-500/5 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-300 cursor-default select-none inline-flex items-center gap-2">
                        <img src="https://cdn.simpleicons.org/{{ $skill['slug'] }}"
                             alt="{{ $skill['name'] }}"
                             class="w-4 h-4 shrink-0"
                             loading="lazy">
                        {{ $skill['name'] }}
                        <span class="absolute -top-1 -right-1 w-2 h-2 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                              style="background: {{ $skill['level'] >= 85 ? '#22c55e' : ($skill['level'] >= 70 ? '#6366f1' : '#a1a1aa') }}">
                        </span>
                    </span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
