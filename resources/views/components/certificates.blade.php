@props(['certificates'])

<section id="certificates" class="py-24 sm:py-32 bg-zinc-100/50 dark:bg-zinc-900/50 scroll-mt-24">
    <div class="max-w-5xl mx-auto px-6">
        <div class="mb-16 reveal opacity-0">
            <span class="section-label">Certificates</span>
            <h2 class="section-title mt-2">Credentials & <span class="text-indigo-600 dark:text-indigo-400">Achievements</span></h2>
        </div>

        @if (!empty($certificates['stats']))
        <div class="grid grid-cols-3 gap-4 mb-12 reveal opacity-0">
            @foreach ($certificates['stats'] as $stat)
            <div class="text-center p-5 rounded-xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800">
                <div class="text-2xl sm:text-3xl font-bold text-zinc-900 dark:text-zinc-50">
                    {{ $stat['value'] }}
                </div>
                <div class="text-xs font-mono text-zinc-500 dark:text-zinc-400 mt-1">
                    {{ $stat['label'] }}
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($certificates['items'] as $index => $cert)
            @php
                $colorMap = [
                    'cyan' => 'bg-cyan-100 dark:bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 border-cyan-200 dark:border-cyan-500/20',
                    'blue' => 'bg-blue-100 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 border-blue-200 dark:border-blue-500/20',
                    'orange' => 'bg-orange-100 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 border-orange-200 dark:border-orange-500/20',
                    'purple' => 'bg-purple-100 dark:bg-purple-500/10 text-purple-600 dark:text-purple-400 border-purple-200 dark:border-purple-500/20',
                    'emerald' => 'bg-emerald-100 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border-emerald-200 dark:border-emerald-500/20',
                ];
                $badgeClass = $colorMap[$cert['color']] ?? 'bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400';
            @endphp
            <div class="reveal opacity-0 group bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-xl p-5 hover:border-indigo-300 dark:hover:border-indigo-500/30 transition-all"
                style="animation-delay: {{ $index * 0.05 }}s">
                <div class="flex items-start justify-between mb-3">
                    <div>
                        <h3 class="text-sm font-bold text-zinc-900 dark:text-zinc-50">
                            {{ $cert['title'] }}
                        </h3>
                        <p class="text-xs text-indigo-600 dark:text-indigo-400 font-medium mt-0.5">
                            {{ $cert['org'] }}
                        </p>
                    </div>
                    <span class="text-[10px] font-mono text-zinc-400 dark:text-zinc-500 shrink-0 mt-0.5">
                        {{ $cert['year'] }}
                    </span>
                </div>
                <span class="inline-block text-[10px] px-2.5 py-0.5 rounded-full font-mono border {{ $badgeClass }}">
                    {{ $cert['org'] }}
                </span>
                @if ($cert['file'] !== '#')
                <div class="mt-3 pt-3 border-t border-zinc-100 dark:border-zinc-800">
                    <a href="{{ asset('pdfs/' . $cert['file']) }}" target="_blank"
                        class="inline-flex items-center gap-1.5 text-[11px] font-mono text-zinc-500 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        View Certificate
                    </a>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
