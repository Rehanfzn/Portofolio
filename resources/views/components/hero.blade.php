@props(['profile'])

<section id="home"
    class="relative min-h-screen flex items-center justify-center pt-20 scroll-mt-24 overflow-hidden bg-black">

    <div class="aurora">
        <div class="aurora-blob"></div>
        <div class="aurora-blob"></div>
        <div class="aurora-blob"></div>
        <div class="aurora-blob"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 text-center">
        <div class="max-w-2xl mx-auto space-y-6">

            <div class="reveal opacity-0">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs font-mono text-white/80">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Available for freelance
                </span>
            </div>

            <div class="reveal opacity-0" style="animation-delay: 0.1s">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-white tracking-tight leading-tight drop-shadow-lg">
                    {{ $profile['name'] }}
                </h1>
            </div>

            <div class="reveal opacity-0" style="animation-delay: 0.2s">
                <p class="text-lg sm:text-xl text-indigo-300 font-medium drop-shadow">
                    {{ $profile['title'] }}
                </p>
            </div>

            <div class="reveal opacity-0" style="animation-delay: 0.3s">
                <p class="text-sm sm:text-base text-zinc-300 max-w-lg mx-auto leading-relaxed drop-shadow">
                    {{ $profile['headline'] }}
                </p>
            </div>

            <div class="reveal opacity-0 flex flex-wrap justify-center gap-3 pt-2" style="animation-delay: 0.4s">
                <a href="#experience"
                    class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-2.5 px-5 rounded-lg transition-all text-sm shadow-lg">
                    View Experience
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                    </svg>
                </a>
                <a href="#contact"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg text-sm font-medium text-white/80 hover:text-white bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 transition-all shadow-lg">
                    Get in Touch
                </a>
            </div>
        </div>
    </div>
</section>
