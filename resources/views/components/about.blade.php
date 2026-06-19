@props(['profile'])

<section id="about" class="py-24 sm:py-32 bg-zinc-100/50 dark:bg-zinc-900/50 scroll-mt-24">
    <div class="max-w-3xl mx-auto px-6">
        <div class="mb-16 reveal opacity-0">
            <span class="section-label">About</span>
            <h2 class="section-title mt-2">Get to Know <span class="text-indigo-600 dark:text-indigo-400">Me</span></h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-2 reveal opacity-0 flex justify-center">
                <div x-data="photoSphere()" class="photo-sphere">
                    <div class="photo-sphere-card w-56 h-56 sm:w-64 sm:h-64 cursor-grab active:cursor-grabbing select-none"
                        x-ref="container"
                        :style="cardStyle"
                        @mousedown="startDrag"
                        @mousemove="onDrag"
                        @mouseup="endDrag"
                        @mouseleave="endDrag"
                        @touchstart.prevent="startDrag"
                        @touchmove.prevent="onDrag"
                        @touchend="endDrag"
                        @click="toggleColor">
                        <div class="absolute inset-0 flex items-center justify-center text-zinc-400 text-xs font-mono" x-show="!loaded">Loading...</div>
                        <img src="{{ asset($profile['photo']) }}"
                            alt="{{ $profile['name'] }}"
                            x-ref="photo"
                            @load="loaded = true"
                            class="w-full h-full object-cover pointer-events-none"
                            :style="imgStyle"
                            draggable="false">
                        <div class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-black/60 text-white text-[10px] px-2 py-0.5 rounded-full font-mono whitespace-nowrap transition-opacity duration-300"
                            :class="colored ? 'opacity-0' : 'opacity-100'">
                            Drag &amp; click to colorize
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3 reveal opacity-0">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-100 dark:bg-indigo-500/10 border border-indigo-200 dark:border-indigo-500/20 text-xs font-mono text-indigo-600 dark:text-indigo-400 mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                    {{ $profile['badge'] }}
                </div>

                <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-6">
                    {{ $profile['bio'] }}
                </p>

                <div class="space-y-3">
                    <div class="flex items-center gap-3 text-sm text-zinc-600 dark:text-zinc-400">
                        <span class="w-8 h-8 rounded-lg bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </span>
                        {{ $profile['location'] }}
                    </div>

                    <div class="flex items-center gap-3 text-sm text-zinc-600 dark:text-zinc-400">
                        <span class="w-8 h-8 rounded-lg bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </span>
                        {{ $profile['email'] }}
                    </div>

                    @if (!empty($profile['education']))
                    <div class="flex items-start gap-3 text-sm text-zinc-600 dark:text-zinc-400">
                        <span class="w-8 h-8 rounded-lg bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                            </svg>
                        </span>
                        <div>
                            @foreach ($profile['education'] as $edu)
                            <div class="mb-1 last:mb-0">
                                <span class="text-zinc-800 dark:text-zinc-200 font-medium">{{ $edu['school'] }}</span>
                                <span class="text-zinc-400">— {{ $edu['major'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <div class="mt-6 pt-6 border-t border-zinc-200 dark:border-zinc-800">
                    <a href="{{ asset($profile['cv_url']) }}" target="_blank"
                        class="inline-flex items-center gap-2 bg-zinc-900 dark:bg-white dark:text-zinc-900 text-white font-medium py-2.5 px-5 rounded-lg hover:bg-zinc-800 dark:hover:bg-zinc-100 transition-all text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Download CV
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
