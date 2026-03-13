<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Desa Digital') }} - Transformasi Administrasi Desa</title>

        <!-- Scripts -->
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Outfit', sans-serif;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                background-color: #ffffff;
            }
            .hero-gradient {
                background: radial-gradient(circle at 0% 0%, rgba(79, 70, 229, 0.08) 0%, transparent 40%),
                            radial-gradient(circle at 100% 100%, rgba(124, 58, 237, 0.08) 0%, transparent 40%),
                            #ffffff;
            }
            .dark .hero-gradient {
                background: radial-gradient(circle at 0% 0%, rgba(79, 70, 229, 0.15) 0%, transparent 40%),
                            radial-gradient(circle at 100% 100%, rgba(124, 58, 237, 0.15) 0%, transparent 40%),
                            #0f172a;
            }
            .section-divider {
                background: linear-gradient(to bottom, transparent, rgba(79, 70, 229, 0.02), transparent);
            }
            [x-cloak] { display: none !important; }
            .glass-nav {
                background: rgba(255, 255, 255, 0.75);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border-bottom: 1px solid rgba(79, 70, 229, 0.08);
            }
            .dark .glass-nav {
                background: rgba(15, 23, 42, 0.75);
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            }
            .floating {
                animation: float 6s ease-in-out infinite;
            }
            @keyframes float {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
                100% { transform: translateY(0px); }
            }
            .animate-slow-fade {
                animation: fadeIn 1.5s ease-out forwards;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
        </style>
    </head>
    <body class="antialiased text-slate-900 dark:text-slate-100 bg-white dark:bg-slate-900 selection:bg-indigo-600 selection:text-white transition-colors duration-500">
        <!-- Navigation -->
        <nav class="fixed top-0 w-full z-50 glass-nav transition-all duration-300">
            <div class="max-w-7xl mx-auto px-8 h-24 flex items-center justify-between">
                <div class="flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl flex items-center justify-center shadow-xl shadow-indigo-200 group-hover:rotate-6 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <span class="text-2xl font-black tracking-tighter text-slate-900 dark:text-white uppercase">Desa Digital</span>
                </div>

                <div class="hidden md:flex items-center gap-8 text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest">
                    <a href="#fitur" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors py-2 relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-indigo-600 hover:after:w-full after:transition-all">Fitur</a>
                    <a href="#tentang" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors py-2 relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-indigo-600 hover:after:w-full after:transition-all">Tentang</a>
                    
                    <!-- Theme Toggle -->
                    <button id="theme-toggle" class="p-3 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-2xl hover:scale-110 transition-all">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>

                    @if (Route::has('login'))
                        <div class="flex items-center gap-5 ml-2">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-8 py-3 bg-slate-900 dark:bg-indigo-600 text-white rounded-2xl hover:bg-indigo-600 dark:hover:bg-indigo-500 transition-all shadow-xl shadow-slate-200 dark:shadow-none hover:shadow-indigo-200 font-black tracking-widest text-xs uppercase text-center">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors font-black tracking-widest text-xs uppercase">Masuk</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-8 py-3.5 bg-indigo-600 text-white rounded-2xl hover:bg-indigo-700 transition-all font-black tracking-widest text-xs uppercase shadow-xl shadow-indigo-200 transform hover:-translate-y-0.5">Daftar</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        <div class="hero-gradient transition-colors duration-500">
            <!-- Hero Section -->
            <section class="max-w-7xl mx-auto px-8 pt-48 pb-32 lg:pb-48 flex flex-col lg:flex-row items-center gap-20">
                <div class="lg:w-1/2 text-center lg:text-left animate-slow-fade">
                    <div class="inline-flex items-center gap-3 px-5 py-2.5 bg-indigo-50/50 dark:bg-indigo-500/10 border border-indigo-100 dark:border-indigo-500/20 rounded-full text-indigo-700 dark:text-indigo-400 text-[10px] font-black uppercase tracking-[0.2em] mb-10 shadow-sm backdrop-blur-sm">
                        <span class="relative flex h-2.5 w-2.5">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-indigo-600 dark:bg-indigo-400"></span>
                        </span>
                        Sistem Desa Cerdas & Mandiri
                    </div>
                    <h1 class="text-6xl lg:text-[5.5rem] font-black text-slate-900 dark:text-white leading-[0.95] mb-10 tracking-tighter">
                        Membangun Desa <br> <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">Digital</span>
                    </h1>
                    <p class="text-xl lg:text-2xl text-slate-500 dark:text-slate-400 font-medium mb-12 leading-relaxed max-w-xl">
                        Solusi administrasi modern untuk efisiensi birokrasi, transparansi data, dan pelayanan publik yang lebih inklusif.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center gap-5 justify-center lg:justify-start">
                        <a href="{{ route('login') }}" class="group w-full sm:w-auto px-12 py-5 bg-slate-900 dark:bg-indigo-600 text-white rounded-[2.5rem] font-black uppercase tracking-widest text-xs shadow-2xl shadow-slate-300 dark:shadow-none hover:bg-indigo-600 dark:hover:bg-indigo-500 transform hover:-translate-y-1 transition-all duration-500 overflow-hidden relative">
                            <span class="relative z-10 flex items-center gap-2 text-center justify-center">Mulai Sekarang <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></span>
                        </a>
                        <a href="#fitur" class="w-full sm:w-auto px-12 py-5 bg-white dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400 rounded-[2.5rem] font-black uppercase tracking-widest text-xs hover:border-indigo-100 dark:hover:border-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-300 text-center">
                            Fitur Utama
                        </a>
                    </div>
                </div>

                <div class="lg:w-1/2 relative group">
                    <div class="absolute -inset-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full opacity-10 blur-[100px] group-hover:opacity-20 transition duration-1000"></div>
                    <div class="relative bg-white dark:bg-slate-800 p-5 rounded-[3rem] shadow-[0_32px_64px_-16px_rgba(0,0,0,0.1)] border border-slate-100/50 dark:border-slate-700/50 overflow-hidden transform group-hover:scale-[1.02] transition-transform duration-700">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1200" alt="Dashboard Preview" class="rounded-[2.5rem] grayscale-[0.2] group-hover:grayscale-0 transition-all duration-700">
                        
                        <!-- Floating Minimalist Stats Overlay -->
                        <div class="absolute top-12 -right-8 bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl p-8 rounded-[2rem] shadow-2xl border border-white/50 dark:border-slate-700/50 floating">
                            <div class="flex items-center gap-5">
                                <div class="w-14 h-14 bg-indigo-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-200 dark:shadow-none">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-indigo-400 uppercase tracking-widest leading-none mb-1.5">Efisiensi</p>
                                    <p class="text-3xl font-black text-slate-900 dark:text-white leading-none">99.8%</p>
                                </div>
                            </div>
                        </div>

                        <div class="absolute bottom-12 -left-8 bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl p-8 rounded-[2rem] shadow-2xl border border-white/50 dark:border-slate-700/50 floating [animation-delay:2s]">
                            <div class="flex items-center gap-5">
                                <div class="w-14 h-14 bg-emerald-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-200 dark:shadow-none">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-emerald-400 uppercase tracking-widest leading-none mb-1.5">Terverifikasi</p>
                                    <p class="text-3xl font-black text-slate-900 dark:text-white leading-none">1.2k+</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section id="fitur" class="max-w-7xl mx-auto px-8 py-32 lg:py-56 section-divider border-y border-slate-50 dark:border-slate-800 transition-colors duration-500">
                <div class="text-center max-w-4xl mx-auto mb-32">
                    <span class="text-xs font-black text-indigo-600 dark:text-indigo-400 uppercase tracking-[0.4em] mb-6 block">Kecanggihan Sistem</span>
                    <h2 class="text-5xl lg:text-7xl font-black text-slate-900 dark:text-white leading-none tracking-tight mb-8">Satu Platform, <br> Jutaan Manfaat.</h2>
                    <p class="text-xl text-slate-500 dark:text-slate-400 font-medium">Kami menyediakan ekosistem digital terbaik untuk akselerasi pertumbuhan desa.</p>
                </div>

                <div class="grid lg:grid-cols-3 gap-12">
                    <!-- Feature 1 -->
                    <div class="p-12 bg-white dark:bg-slate-800 rounded-[3.5rem] border border-slate-100 dark:border-slate-700 shadow-[0_20px_40px_-15px_rgba(0,0,0,0.03)] hover:shadow-[0_40px_80px_-20px_rgba(79,70,229,0.12)] dark:hover:shadow-[0_40px_80px_-20px_rgba(79,70,229,0.2)] hover:-translate-y-2 transition-all duration-500 group">
                        <div class="w-20 h-20 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 rounded-3xl flex items-center justify-center mb-10 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 dark:text-white mb-6">Database Penduduk</h3>
                        <p class="text-slate-500 dark:text-slate-400 font-medium leading-relaxed text-lg">Penyimpanan data yang aman dengan validasi otomatis dan pencarian data yang sangat responsif.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="p-12 bg-white dark:bg-slate-800 rounded-[3.5rem] border border-slate-100 dark:border-slate-700 shadow-[0_20px_40px_-15px_rgba(0,0,0,0.03)] hover:shadow-[0_40px_80px_-20px_rgba(124,58,237,0.12)] dark:hover:shadow-[0_40px_80px_-20px_rgba(124,58,237,0.2)] hover:-translate-y-2 transition-all duration-500 group">
                        <div class="w-20 h-20 bg-purple-50 dark:bg-purple-500/10 text-purple-600 dark:text-purple-400 rounded-3xl flex items-center justify-center mb-10 group-hover:scale-110 group-hover:-rotate-3 transition-all duration-500">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 dark:text-white mb-6">Automasi Surat</h3>
                        <p class="text-slate-500 dark:text-slate-400 font-medium leading-relaxed text-lg">Hasilkan surat keterangan, pengantar, dan surat resmi lainnya secara instan dengan satu klik.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="p-12 bg-white dark:bg-slate-800 rounded-[3.5rem] border border-slate-100 dark:border-slate-700 shadow-[0_20px_40px_-15px_rgba(0,0,0,0.03)] hover:shadow-[0_40px_80px_-20px_rgba(16,185,129,0.12)] dark:hover:shadow-[0_40px_80px_-20px_rgba(16,185,129,0.2)] hover:-translate-y-2 transition-all duration-500 group">
                        <div class="w-20 h-20 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 rounded-3xl flex items-center justify-center mb-10 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 dark:text-white mb-6">Analitik Real-time</h3>
                        <p class="text-slate-500 dark:text-slate-400 font-medium leading-relaxed text-lg">Pantau perkembangan desa melalui dashboard interaktif yang menyajikan data secara visual.</p>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section id="tentang" class="max-w-7xl mx-auto px-8 py-32 lg:py-48">
                <div class="relative bg-slate-900 rounded-[4rem] p-16 lg:p-32 overflow-hidden shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/30 via-transparent to-purple-600/30"></div>
                    <div class="absolute -top-24 -right-24 w-96 h-96 bg-indigo-500/10 rounded-full blur-[80px]"></div>
                    <div class="relative z-10 lg:w-3/4">
                        <h2 class="text-5xl lg:text-7xl font-black text-white leading-none tracking-tighter mb-10">Siap Melangkah <br> ke Masa Depan?</h2>
                        <p class="text-indigo-100/60 text-xl lg:text-2xl font-medium mb-16 leading-relaxed max-w-2xl">Bergabunglah dengan ekosistem digital kami dan rasakan transformasi nyata dalam tata kelola pemerintahan desa Anda.</p>
                        <a href="{{ route('register') }}" class="group inline-flex items-center gap-4 px-14 py-6 bg-indigo-600 text-white rounded-[2.5rem] font-black uppercase tracking-widest text-xs shadow-2xl shadow-indigo-500/20 hover:bg-white hover:text-slate-900 transform hover:scale-105 transition-all duration-500">
                            Daftar Sekarang <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class="max-w-7xl mx-auto px-8 pt-32 pb-20 mt-20 border-t border-slate-100 dark:border-slate-800 transition-colors duration-500">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-16 mb-24">
                    <div class="max-w-sm">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-10 h-10 bg-slate-900 dark:bg-indigo-600 rounded-xl flex items-center justify-center transition-colors">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <span class="text-2xl font-black tracking-tighter text-slate-900 dark:text-white uppercase transition-colors">Desa Digital</span>
                        </div>
                        <p class="text-slate-400 dark:text-slate-500 text-lg font-medium leading-relaxed italic transition-colors">"Transformasi administrasi desa untuk pelayanan publik yang lebih transparan dan efisien."</p>
                    </div>
                    
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-16">
                        <div class="flex flex-col gap-6 font-black uppercase tracking-widest text-[10px]">
                            <p class="text-slate-900 dark:text-white transition-colors">Halaman</p>
                            <a href="#" class="text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 font-bold transition-colors">Utama</a>
                            <a href="#fitur" class="text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 font-bold transition-colors">Fitur</a>
                            <a href="#tentang" class="text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 font-bold transition-colors">Tentang</a>
                        </div>
                        <div class="flex flex-col gap-6 font-black uppercase tracking-widest text-[10px]">
                            <p class="text-slate-900 dark:text-white transition-colors">Legal</p>
                            <a href="#" class="text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 font-bold transition-colors">Privasi</a>
                            <a href="#" class="text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 font-bold transition-colors">Syarat</a>
                        </div>
                        <div class="hidden lg:flex flex-col gap-6 font-black uppercase tracking-widest text-[10px]">
                            <p class="text-slate-900 dark:text-white transition-colors">Sosial</p>
                            <a href="#" class="text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 font-bold transition-colors">Instagram</a>
                            <a href="#" class="text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 font-bold transition-colors">Twitter</a>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col md:flex-row justify-between items-center gap-8 pt-12 border-t border-slate-50 dark:border-slate-800 text-slate-400 dark:text-slate-500 text-[10px] font-bold uppercase tracking-[0.3em] transition-colors duration-500">
                    <div>&copy; {{ date('Y') }} SISTEM DESA DIGITAL — KARYA FERNANDA WAWANG AZRAQI</div>
                    <div class="flex items-center gap-8">
                        <span class="text-indigo-400/50 dark:text-indigo-500/50">Modernizing Rural Indonesia</span>
                        <span>Made with ❤️ for the community</span>
                    </div>
                </div>
            </footer>
        </div>

        <script>
            // Theme Management
            const themeToggleBtn = document.getElementById('theme-toggle');
            const darkIcon = document.getElementById('theme-toggle-dark-icon');
            const lightIcon = document.getElementById('theme-toggle-light-icon');

            function updateIcons() {
                if (document.documentElement.classList.contains('dark')) {
                    darkIcon.classList.add('hidden');
                    lightIcon.classList.remove('hidden');
                } else {
                    darkIcon.classList.remove('hidden');
                    lightIcon.classList.add('hidden');
                }
            }

            updateIcons();

            themeToggleBtn.addEventListener('click', () => {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
                updateIcons();
            });

            // Simple glass nav transition on scroll
            window.addEventListener('scroll', () => {
                const nav = document.querySelector('nav');
                if (window.scrollY > 20) {
                    nav.classList.add('shadow-2xl', 'shadow-slate-200/50', 'dark:shadow-none', 'h-20');
                    nav.classList.remove('h-24');
                } else {
                    nav.classList.remove('shadow-2xl', 'shadow-slate-200/50', 'dark:shadow-none', 'h-20');
                    nav.classList.add('h-24');
                }
            });

            // Smooth scroll (Lightweight)
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        </script>
    </body>
</html>
