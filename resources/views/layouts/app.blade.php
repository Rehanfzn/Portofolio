<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rehan Faezan | student Fullstack Developer</title>
    <meta name="description" content="Fullstack web developer specializing in Laravel, PHP, and Tailwind CSS. Based in Jakarta, Indonesia.">

    <meta property="og:title" content="Rehan Faezan | Fullstack Developer">
    <meta property="og:description" content="Fullstack web developer specializing in Laravel & PHP.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('pdfs/Rehanfzn.jpeg') }}">

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <script>
        (function() {
            var t = localStorage.getItem('theme');
            var p = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (t === 'dark' || (!t && p)) {
                document.documentElement.classList.add('dark');
            } else if (t === 'light') {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Person",
        "name": "Rehan Faezan",
        "jobTitle": "Fullstack Developer",
        "url": "{{ url('/') }}",
        "email": "rehanfaezan@example.com",
        "address": { "@@type": "PostalAddress", "addressLocality": "Jakarta", "addressCountry": "Indonesia" }
    }
    </script>

    @vite('resources/css/app.css')
</head>

<body class="bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 font-sans antialiased transition-colors duration-300">

    <x-navbar :navigation="$navigation" />

    <main>
        @yield('content')
    </main>

    <x-footer :social="$social" />

    <button onclick="window.scrollTo({top:0,behavior:'smooth'})"
        class="no-print fixed bottom-6 right-6 z-50 w-9 h-9 rounded-xl bg-zinc-200 dark:bg-zinc-800 border border-zinc-300 dark:border-zinc-700 flex items-center justify-center text-zinc-500 dark:text-zinc-400 hover:bg-zinc-300 dark:hover:bg-zinc-700 transition-all opacity-0 pointer-events-none"
        id="scroll-top">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    @vite('resources/js/app.js')

    <script>
        window.addEventListener('scroll', function() {
            var btn = document.getElementById('scroll-top');
            if (window.scrollY > 400) {
                btn.classList.remove('opacity-0', 'pointer-events-none');
                btn.classList.add('opacity-100', 'pointer-events-auto');
            } else {
                btn.classList.add('opacity-0', 'pointer-events-none');
                btn.classList.remove('opacity-100', 'pointer-events-auto');
            }
        });
    </script>
</body>
</html>
