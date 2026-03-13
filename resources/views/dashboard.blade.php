<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="text-4xl font-black text-indigo-950 tracking-tight leading-tight mb-1">
                    Halo, <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">{{ explode(' ', Auth::user()->name)[0] }}</span>!
                </h2>
                <p class="text-indigo-900/40 font-bold text-sm uppercase tracking-widest flex items-center gap-2">
                   <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                   Pusat Kontrol Digital Desa
                </p>
            </div>
            <div class="flex items-center gap-4">
                <div class="glass px-6 py-4 rounded-3xl shadow-xl shadow-indigo-900/5 group">
                    <p class="text-[10px] font-black text-indigo-400 uppercase tracking-widest mb-1 group-hover:text-indigo-600 transition-colors">{{ now()->translatedFormat('l') }}</p>
                    <p class="text-lg font-black text-indigo-950 tracking-tighter">{{ now()->translatedFormat('d F Y') }}</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="space-y-12">
        <!-- Main Highlight Section -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Stats Card 1: Warga -->
            <div class="bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-[3rem] p-10 shadow-3xl shadow-indigo-900/30 relative overflow-hidden group hover:-translate-y-2 transition-all duration-500">
                <div class="absolute -right-8 -top-8 w-40 h-40 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-white/20 rounded-2xl backdrop-blur-md flex items-center justify-center mb-8 shadow-inner border border-white/20">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <p class="text-indigo-100 font-black text-xs uppercase tracking-[0.2em] mb-2 opacity-80">Populasi Warga</p>
                    <h3 class="text-5xl font-black text-white tracking-tighter mb-1">{{ number_format($stats['total_penduduk']) }}</h3>
                    <p class="text-indigo-200 text-xs font-bold uppercase tracking-widest">Jiwa Terdaftar</p>
                </div>
            </div>

            <!-- Stats Card 2: Surat Harian -->
            <div class="glass rounded-[3rem] p-10 shadow-2xl shadow-indigo-900/5 group hover:bg-white transition-all duration-500 hover:-translate-y-2 relative overflow-hidden border-2 border-transparent hover:border-emerald-100">
                <div class="absolute -right-8 -top-8 w-40 h-40 bg-emerald-50 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700 opacity-0 group-hover:opacity-100"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-emerald-900/40 font-black text-xs uppercase tracking-[0.2em] mb-2">Surat Hari Ini</p>
                    <h3 class="text-5xl font-black text-indigo-950 tracking-tighter mb-1">{{ number_format($stats['surat_hari_ini']) }}</h3>
                    <p class="text-indigo-950/20 text-xs font-bold uppercase tracking-widest">Dokumen Terbit</p>
                </div>
            </div>

            <!-- Stats Card 3: Surat Bulanan -->
            <div class="glass rounded-[3rem] p-10 shadow-2xl shadow-indigo-900/5 group hover:bg-white transition-all duration-500 hover:-translate-y-2 relative overflow-hidden border-2 border-transparent hover:border-indigo-100">
                <div class="absolute -right-8 -top-8 w-40 h-40 bg-indigo-50 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700 opacity-0 group-hover:opacity-100"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <p class="text-indigo-900/40 font-black text-xs uppercase tracking-[0.2em] mb-2">Total Bulan Ini</p>
                    <h3 class="text-5xl font-black text-indigo-950 tracking-tighter mb-1">{{ number_format($stats['surat_bulan_ini']) }}</h3>
                    <p class="text-indigo-950/20 text-xs font-bold uppercase tracking-widest">Lalu Lintas Data</p>
                </div>
            </div>

            <!-- Stats Card 4: Arsip -->
            <div class="glass rounded-[3rem] p-10 shadow-2xl shadow-indigo-900/5 group hover:bg-white transition-all duration-500 hover:-translate-y-2 relative overflow-hidden border-2 border-transparent hover:border-purple-100">
                <div class="absolute -right-8 -top-8 w-40 h-40 bg-purple-50 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700 opacity-0 group-hover:opacity-100"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <p class="text-purple-900/40 font-black text-xs uppercase tracking-[0.2em] mb-2">Total Arsip</p>
                    <h3 class="text-5xl font-black text-indigo-950 tracking-tighter mb-1">{{ number_format($stats['total_arsip']) }}</h3>
                    <p class="text-indigo-950/20 text-xs font-bold uppercase tracking-widest">Dokumen Abadi</p>
                </div>
            </div>
        </div>

        <!-- Charts & Interaction -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 glass rounded-[3.5rem] p-12 shadow-3xl shadow-indigo-950/5 relative overflow-hidden group">
                <!-- Background decor -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-50/50 rounded-full blur-3xl -mr-20 -mt-20 group-hover:bg-indigo-100 transition-colors duration-700"></div>
                <div class="relative z-10 h-full flex flex-col">
                    <div class="flex items-center justify-between mb-12">
                        <div>
                            <h3 class="text-2xl font-black text-indigo-950 tracking-tight">Performa Administrasi</h3>
                            <p class="text-sm font-bold text-indigo-900/40 uppercase tracking-widest mt-1">Estimasi Volume Surat 6 Bulan Terakhir</p>
                        </div>
                        <div class="flex items-center gap-3 bg-white px-5 py-3 rounded-2xl shadow-sm border border-indigo-50">
                             <div class="w-3 h-3 bg-indigo-600 rounded-full shadow-lg shadow-indigo-600/30"></div>
                             <span class="text-xs font-extrabold text-indigo-900 uppercase">Input Data</span>
                        </div>
                    </div>
                    <div class="flex-grow flex items-end">
                        <canvas id="lettersChart" class="w-full h-full max-h-[300px]"></canvas>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-8">
                <!-- Quick Action Card -->
                <div class="bg-gradient-to-br from-indigo-900 to-indigo-950 rounded-[3.5rem] p-10 shadow-3xl text-white relative overflow-hidden group flex-1">
                    <div class="absolute top-0 right-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 pointer-events-none"></div>
                    <div class="relative z-10 flex flex-col h-full">
                         <div class="w-16 h-16 bg-white/10 rounded-2xl backdrop-blur-md flex items-center justify-center mb-8 border border-white/20">
                            <svg class="w-8 h-8 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                         </div>
                         <h3 class="text-2xl font-black text-white mb-4 leading-tight tracking-tight">Layanan Mandiri Digital</h3>
                         <p class="text-indigo-200/60 font-medium text-sm leading-relaxed mb-auto">
                            Optimalkan pelayanan warga dengan template otomatis. Efisiensi kerja naik hingga 80% dengan otomasi dokumen digital.
                         </p>
                         <a href="{{ route('surat.create') }}" class="mt-8 group/btn flex items-center justify-center gap-4 py-6 bg-white text-indigo-950 rounded-[2rem] font-black text-sm tracking-[0.1em] shadow-2xl hover:bg-indigo-50 hover:-translate-y-1 transition-all duration-500 overflow-hidden relative">
                            <div class="absolute inset-0 bg-indigo-600 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-500"></div>
                            <span class="relative z-10 group-hover/btn:text-white transition-colors duration-500 uppercase tracking-widest">Mulai Buat Surat</span>
                            <svg class="w-5 h-5 relative z-10 group-hover/btn:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                         </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js and Custom Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('lettersChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(79, 70, 229, 0.8)');
        gradient.addColorStop(1, 'rgba(124, 58, 237, 0.1)');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json(collect($chartData)->pluck('month')),
                datasets: [{
                    label: 'Volume Surat',
                    data: @json(collect($chartData)->pluck('count')),
                    backgroundColor: gradient,
                    borderColor: '#4f46e5',
                    borderWidth: 0.5,
                    borderRadius: 24,
                    barThickness: 32,
                    hoverBackgroundColor: '#4f46e5',
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                         backgroundColor: '#1e1b4b',
                         padding: 16,
                         titleFont: { size: 12, weight: 'bold', family: 'Outfit' },
                         bodyFont: { size: 14, family: 'Outfit' },
                         cornerRadius: 16,
                         displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { display: false, drawBorder: false },
                        ticks: { display: false }
                    },
                    x: {
                        grid: { display: false, drawBorder: false },
                        ticks: { 
                            font: { family: 'Outfit', weight: 'bold', size: 11 },
                            color: '#6366f1',
                            padding: 12
                        }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeOutQuart'
                }
            }
        });
    </script>
</x-app-layout>
