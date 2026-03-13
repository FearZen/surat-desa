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
            .sidebar-gradient {
                background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            }
            .glass {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
            .glass-dark {
                background: rgba(15, 23, 42, 0.8); /* Slate-900 with opacity */
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            .sidebar-gradient {
                background: linear-gradient(180deg, #1e1b4b 0%, #312e81 100%);
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-slate-900 text-slate-900 dark:text-slate-100 transition-colors duration-300">
        <div class="min-h-screen bg-gray-100 dark:bg-slate-900 transition-colors duration-300">
            <x-sidebar />

            <div class="sm:ml-72 min-h-screen flex flex-col">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white dark:bg-slate-900 border-b border-gray-100 dark:border-slate-800 transition-colors duration-300">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-grow p-6 lg:p-10">
                    <div class="max-w-7xl mx-auto">
                        {{ $slot }}
                    </div>
                </main>

                <!-- Footer Attribution -->
                <footer class="p-6 text-center text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 dark:text-slate-600">
                    &copy; {{ date('Y') }} SISTEM DESA DIGITAL — DEVELOPED BY FERNANDA WAWANG AZRAQI
                </footer>
            </div>

            <!-- Toast Notifications -->
            @if(session('success') || session('error'))
            <div id="toast" class="fixed bottom-10 right-10 z-50 animate-bounce-short">
                <div class="flex items-center p-4 min-w-[300px] {{ session('success') ? 'bg-emerald-500' : 'bg-rose-500' }} text-white rounded-2xl shadow-2xl border border-white/20 backdrop-blur-md">
                    <div class="p-2 bg-white/20 rounded-lg mr-4">
                        @if(session('success'))
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        @else
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        @endif
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest opacity-70">{{ session('success') ? 'Success' : 'Error' }}</p>
                        <p class="font-medium">{{ session('success') ?? session('error') }}</p>
                    </div>
                </div>
            </div>
            <script>
                setTimeout(() => {
                    document.getElementById('toast').style.display = 'none';
                }, 5000);
            </script>
            @endif
        </div>
    </body>
</html>
