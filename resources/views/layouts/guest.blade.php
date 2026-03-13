<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script>
            if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Outfit', sans-serif;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
            .auth-gradient {
                background: radial-gradient(circle at top right, #4f46e5 0%, transparent 50%),
                            radial-gradient(circle at bottom left, #7c3aed 0%, transparent 50%),
                            #0f172a;
            }
            .glass-card {
                background: rgba(255, 255, 255, 0.03);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
        </style>
    </head>
    <body class="font-sans antialiased text-white selection:bg-indigo-500/30">
        <div class="min-h-screen auth-gradient flex flex-col justify-center items-center p-6 relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none opacity-20">
                <div class="absolute -top-24 -left-24 w-96 h-96 bg-indigo-500 rounded-full blur-[120px]"></div>
                <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-purple-500 rounded-full blur-[120px]"></div>
            </div>

            <div class="w-full max-w-md relative z-10">
                <div class="text-center mb-10">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-[2rem] shadow-2xl mb-6 transform hover:rotate-6 transition-transform duration-500">
                         <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h1 class="text-3xl font-black tracking-tight leading-tight">DESA DIGITAL</h1>
                    <p class="text-indigo-400 font-bold uppercase tracking-[0.3em] text-[10px] mt-2">Sistem Administrasi Terpadu</p>
                </div>

                <div class="glass-card rounded-[2.5rem] p-8 lg:p-10 shadow-2xl">
                    {{ $slot }}
                </div>

                <div class="mt-8 text-center">
                    <p class="text-indigo-400/60 text-xs font-medium italic">&copy; {{ date('Y') }} Created by Fernanda Wawang Azraqi — Sistem Desa Digital</p>
                </div>
            </div>
        </div>
    </body>
</html>
