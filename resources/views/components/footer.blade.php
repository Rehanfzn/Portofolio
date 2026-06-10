@props(['social'])

<footer class="py-10 border-t border-zinc-200 dark:border-zinc-800">
    <div class="max-w-5xl mx-auto px-6">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <p class="text-xs text-zinc-400 dark:text-zinc-500 font-mono">
                &copy; {{ date('Y') }} {{ config('portfolio.navigation.brand') }}
            </p>
            <div class="flex gap-5 text-xs font-mono text-zinc-400 dark:text-zinc-500">
                <a href="mailto:{{ config('portfolio.profile.email') }}" class="hover:text-indigo-500 dark:hover:text-indigo-400 transition-colors">Email</a>
                <a href="{{ $social['github'] }}" target="_blank" class="hover:text-indigo-500 dark:hover:text-indigo-400 transition-colors">GitHub</a>
                <a href="{{ $social['linkedin'] }}" target="_blank" class="hover:text-indigo-500 dark:hover:text-indigo-400 transition-colors">LinkedIn</a>
            </div>
        </div>
    </div>
</footer>
