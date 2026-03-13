<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8">
            <div>
                <h2 class="text-4xl font-black text-indigo-950 tracking-tight leading-tight mb-2">
                    Basis Data <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Warga</span>
                </h2>
                <p class="text-indigo-900/40 font-bold text-xs uppercase tracking-[0.2em]">Manajemen Registrasi Penduduk Desa</p>
            </div>
            <div>
                <a href="{{ route('penduduk.create') }}" class="group/btn relative inline-flex items-center gap-3 px-10 py-5 bg-indigo-950 text-white rounded-[2rem] font-black text-sm tracking-widest uppercase hover:bg-indigo-900 transition-all duration-300 shadow-2xl shadow-indigo-950/20 overflow-hidden">
                    <div class="absolute inset-0 bg-indigo-600 -translate-x-full group-hover/btn:translate-x-0 transition-transform duration-500"></div>
                    <svg class="w-5 h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span class="relative z-10">Tambah Warga Baru</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="space-y-10">
        <!-- Filter & Search Toolbar -->
        <div class="glass rounded-[3rem] p-10 shadow-3xl shadow-indigo-900/5">
            <form action="{{ route('penduduk.index') }}" method="GET" class="flex flex-col md:flex-row gap-6">
                <div class="flex-grow relative group">
                    <div class="absolute inset-y-0 left-0 pl-7 flex items-center pointer-events-none text-indigo-300 group-focus-within:text-indigo-600 transition-colors">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari NIK atau Nama warga..." class="block w-full pl-16 pr-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 rounded-[2rem] text-base font-bold text-indigo-950 placeholder-indigo-300 transition-all duration-300 shadow-sm shadow-indigo-900/5">
                </div>
                <button type="submit" class="px-12 py-5 bg-indigo-600 text-white rounded-[2rem] font-black text-sm tracking-widest uppercase hover:bg-indigo-700 transition-all duration-300 shadow-xl shadow-indigo-600/20">Eksekusi Cari</button>
                @if(request('search'))
                    <a href="{{ route('penduduk.index') }}" class="px-8 py-5 bg-white border-2 border-indigo-50 text-indigo-400 rounded-[2rem] font-black text-sm hover:bg-gray-50 transition-all duration-300 flex items-center justify-center tracking-widest uppercase">Reset</a>
                @endif
            </form>
        </div>

        <!-- Premium Table Section -->
        <div class="glass rounded-[3.5rem] shadow-3xl shadow-indigo-950/5 overflow-hidden border border-white/50">
            <div class="overflow-x-auto min-h-[400px]">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-indigo-50/30">
                            <th class="px-12 py-8 text-[11px] font-black text-indigo-400 uppercase tracking-[0.3em]">Profil Warga</th>
                            <th class="px-8 py-8 text-[11px] font-black text-indigo-400 uppercase tracking-[0.3em] text-center">Identitas</th>
                            <th class="px-8 py-8 text-[11px] font-black text-indigo-400 uppercase tracking-[0.3em]">Domisili</th>
                            <th class="px-8 py-8 text-[11px] font-black text-indigo-400 uppercase tracking-[0.3em]">Profesi</th>
                            <th class="px-12 py-8 text-[11px] font-black text-indigo-400 uppercase tracking-[0.3em] text-right">Manajemen</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-indigo-50/50">
                        @forelse($penduduks as $p)
                        <tr class="group hover:bg-white/80 transition-all duration-300 cursor-default">
                            <td class="px-12 py-8">
                                <div class="flex items-center">
                                    <div class="w-14 h-14 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300 shadow-inner">
                                        <span class="text-indigo-600 font-black text-xl">{{ strtoupper(substr($p->nama, 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <div class="text-lg font-black text-indigo-950 tracking-tight leading-tight group-hover:text-indigo-600 transition-colors">{{ $p->nama }}</div>
                                        <div class="text-[10px] font-bold text-indigo-300 uppercase tracking-widest mt-1">Warga Tetap</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-8 text-center">
                                <div class="inline-flex px-4 py-2 bg-gray-50 border border-gray-100 rounded-xl text-[10px] font-black text-indigo-900/60 uppercase tracking-widest group-hover:border-indigo-200 transition-colors">
                                    NIK: {{ $p->nik }}
                                </div>
                            </td>
                            <td class="px-8 py-8">
                                <div class="text-sm font-bold text-indigo-950 leading-relaxed">{{ $p->alamat }}</div>
                                <div class="flex items-center gap-3 mt-1.5 font-bold text-[10px] text-indigo-400 uppercase tracking-widest">
                                   <span>RT {{ $p->rt }}</span>
                                   <span class="w-1 h-1 bg-indigo-200 rounded-full"></span>
                                   <span>RW {{ $p->rw }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-8">
                                <span class="inline-flex items-center px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl text-[10px] font-black uppercase tracking-widest">
                                    {{ $p->pekerjaan }}
                                </span>
                            </td>
                            <td class="px-12 py-8 text-right">
                                <div class="flex justify-end gap-4 opacity-20 group-hover:opacity-100 transition-all duration-500 scale-95 group-hover:scale-100">
                                    <a href="{{ route('penduduk.edit', $p) }}" class="w-12 h-12 flex items-center justify-center bg-white border-2 border-indigo-50 text-indigo-600 rounded-2xl hover:bg-indigo-600 hover:text-white hover:border-indigo-600 transition-all duration-300 shadow-sm">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('penduduk.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus data warga ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-12 h-12 flex items-center justify-center bg-white border-2 border-rose-50 text-rose-600 rounded-2xl hover:bg-rose-600 hover:text-white hover:border-rose-600 transition-all duration-300 shadow-sm">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-32">
                                <div class="flex flex-col items-center justify-center opacity-40">
                                    <div class="w-24 h-24 bg-indigo-50 rounded-full flex items-center justify-center mb-6">
                                        <svg class="w-12 h-12 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <p class="text-indigo-900 font-black uppercase tracking-widest text-xs italic">Data Warga Nirmana</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer Pagination -->
            <div class="px-12 py-10 bg-indigo-50/20 border-t border-indigo-50/50">
                <div class="flex items-center justify-between">
                    {{ $penduduks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
