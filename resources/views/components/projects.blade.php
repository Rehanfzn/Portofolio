@props(['projects'])

<section id="projects" class="py-24 sm:py-32 scroll-mt-24">
    <div class="max-w-5xl mx-auto px-6">
        <div class="mb-16 reveal opacity-0">
            <span class="section-label">Projects</span>
            <h2 class="section-title mt-2">Things I've <span class="text-indigo-600 dark:text-indigo-400">Built</span></h2>
        </div>

        <div x-data="projectModal()" class="relative">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach ($projects as $project)
                <div @click="open({{ Js::from($project) }})"
                    class="reveal opacity-0 group bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-xl overflow-hidden hover:border-indigo-300 dark:hover:border-indigo-500/30 transition-all cursor-pointer">
                    <div class="aspect-video bg-zinc-100 dark:bg-zinc-800 overflow-hidden">
                        <img src="{{ str_starts_with($project['image'], 'http') ? $project['image'] : asset($project['image']) }}"
                            alt="{{ $project['title'] }}"
                            loading="lazy"
                            class="w-full h-full object-cover group-hover:scale-[1.02] transition duration-500" />
                    </div>
                    <div class="p-5">
                        <h3 class="text-sm font-bold text-zinc-900 dark:text-zinc-50 mb-1.5">
                            {{ $project['title'] }}
                        </h3>
                        <p class="text-xs text-zinc-500 dark:text-zinc-400 leading-relaxed mb-3 line-clamp-2">
                            {{ $project['desc'] }}
                        </p>
                        <div class="flex flex-wrap gap-1.5 mb-3">
                            @foreach ($project['tags'] as $tag)
                            <span class="text-[10px] px-2 py-0.5 rounded-full bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 font-mono border border-zinc-200 dark:border-zinc-700">{{ $tag }}</span>
                            @endforeach
                        </div>
                        <div class="flex items-center justify-between pt-3 border-t border-zinc-100 dark:border-zinc-800">
                            <div class="flex items-center gap-2">
                                <img src="https://github.com/Rehanfzn.png"
                                    alt="Rehanfzn"
                                    class="w-5 h-5 rounded-full ring-2 ring-zinc-200 dark:ring-zinc-700"
                                    loading="lazy">
                                <span class="text-[11px] font-mono text-zinc-400">Rehanfzn</span>
                            </div>
                            <span class="text-[10px] font-mono text-zinc-500 dark:text-zinc-600 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Click for details
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <template x-teleport="body">
                <div x-show="selected" x-cloak
                    class="fixed inset-0 z-[60] flex items-center justify-center p-4 sm:p-6"
                    x-transition:enter="transition duration-300 ease-out"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition duration-200 ease-in"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"
                        @click="close()"></div>
                    <div x-show="selected" x-cloak
                        x-transition:enter="transition duration-300 ease-out"
                        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition duration-200 ease-in"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                        class="relative w-full max-w-2xl max-h-[90vh] overflow-y-auto bg-white dark:bg-zinc-900 rounded-2xl border border-zinc-200 dark:border-zinc-800 shadow-2xl">
                        <div class="aspect-video bg-zinc-100 dark:bg-zinc-800 relative">
                            <img :src="selected.image.startsWith('http') ? selected.image : '{{ asset('') }}' + selected.image"
                                :alt="selected.title"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        </div>
                        <div class="p-6 sm:p-8">
                            <button @click="close()"
                                class="absolute top-3 right-3 w-8 h-8 rounded-full bg-black/40 hover:bg-black/60 text-white flex items-center justify-center transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                            <div class="flex items-center gap-3 mb-4">
                                <img src="https://github.com/Rehanfzn.png"
                                    alt="Rehanfzn"
                                    class="w-8 h-8 rounded-full ring-2 ring-zinc-200 dark:ring-zinc-700">
                                <div>
                                    <span class="text-sm font-medium text-zinc-900 dark:text-zinc-100">Rehan Faezan</span>
                                    <div class="text-xs font-mono text-zinc-400">
                                        <a :href="'https://github.com/' + (selected.repo || 'Rehanfzn')"
                                            target="_blank"
                                            class="hover:text-indigo-400 transition-colors">
                                            <span x-text="selected.repo || 'Rehanfzn'"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-zinc-900 dark:text-zinc-50 mb-3"
                                x-text="selected.title"></h3>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-6"
                                x-text="selected.full_desc"></p>
                            <div x-show="selected.features && selected.features.length" class="mb-6">
                                <h4 class="text-xs font-mono text-zinc-500 dark:text-zinc-500 uppercase tracking-wider mb-3">Features</h4>
                                <ul class="space-y-2">
                                    <template x-for="feature in selected.features" :key="feature">
                                        <li class="flex items-start gap-2.5 text-sm text-zinc-600 dark:text-zinc-400">
                                            <svg class="w-4 h-4 text-indigo-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            <span x-text="feature"></span>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                            <div class="flex flex-wrap gap-1.5 mb-6">
                                <template x-for="tag in selected.tags" :key="tag">
                                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 font-mono border border-zinc-200 dark:border-zinc-700"
                                        x-text="tag"></span>
                                </template>
                            </div>
                            <a :href="selected.url"
                                target="_blank"
                                class="inline-flex items-center gap-2 text-sm font-medium text-white bg-zinc-900 dark:bg-white dark:text-zinc-900 px-4 py-2 rounded-lg hover:bg-zinc-800 dark:hover:bg-zinc-100 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                View on GitHub
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>
