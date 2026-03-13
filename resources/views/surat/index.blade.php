<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8">
            <div>
                <h2 class="text-4xl font-black text-indigo-950 tracking-tight leading-tight mb-2">
                    Arsip <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Digital</span>
                </h2>
                <p class="text-indigo-900/40 font-bold text-xs uppercase tracking-[0.2em]">Log Penerbitan Dokumen Resmi Desa</p>
            </div>
            <div>
                <a href="{{ route('surat.create') }}" class="group/btn relative inline-flex items-center gap-3 px-10 py-5 bg-indigo-950 text-white rounded-[2rem] font-black text-sm tracking-widest uppercase hover:bg-indigo-900 transition-all duration-300 shadow-2xl shadow-indigo-950/20 overflow-hidden">
                    <div class="absolute inset-0 bg-indigo-600 -translate-x-full group-hover/btn:translate-x-0 transition-transform duration-500"></div>
                    <svg class="w-5 h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span class="relative z-10">Terbitkan Surat Baru</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="space-y-10">
        <!-- High-End Search & Filter -->
        <div class="glass rounded-[3rem] p-10 shadow-3xl shadow-indigo-900/5">
            <form action="{{ route('surat.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="md:col-span-2 relative group">
                    <div class="absolute inset-y-0 left-0 pl-7 flex items-center pointer-events-none text-indigo-300 group-focus-within:text-indigo-600 transition-colors">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari No. Surat atau Nama Warga..." class="block w-full pl-16 pr-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 rounded-[2rem] text-base font-bold text-indigo-950 shadow-sm transition-all duration-300">
                </div>
                <div>
                    <select name="template_id" class="w-full h-full px-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 rounded-[2rem] font-bold text-indigo-950 transition-all duration-300 shadow-sm appearance-none cursor-pointer">
                        <option value="">Semua Format</option>
                        @foreach($templates as $t)
                            <option value="{{ $t->id }}" {{ request('template_id') == $t->id ? 'selected' : '' }}>{{ $t->nama_template }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="px-10 py-5 bg-indigo-600 text-white rounded-[2rem] font-black text-sm tracking-widest uppercase hover:bg-indigo-700 transition-all duration-300 shadow-xl shadow-indigo-600/20">Filter</button>
            </form>
        </div>

        <!-- Alpha Table -->
        <div class="glass rounded-[4rem] shadow-4xl shadow-indigo-950/10 overflow-hidden border border-white/50 bg-white/40">
            <div class="overflow-x-auto min-h-[400px]">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-indigo-950/5">
                            <th class="px-12 py-10 text-[10px] font-black text-indigo-400 uppercase tracking-[0.3em]">Surat Resmi</th>
                            <th class="px-8 py-10 text-[10px] font-black text-indigo-400 uppercase tracking-[0.3em]">Penerima</th>
                            <th class="px-8 py-10 text-[10px] font-black text-indigo-400 uppercase tracking-[0.3em] text-center">Tipe Format</th>
                            <th class="px-8 py-10 text-[10px] font-black text-indigo-400 uppercase tracking-[0.3em] text-center">Alur Status</th>
                            <th class="px-12 py-10 text-[10px] font-black text-indigo-400 uppercase tracking-[0.3em] text-right">Opsi Arsip</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-indigo-950/5">
                        @forelse($surats as $s)
                        <tr class="group hover:bg-white/90 transition-all duration-500 cursor-default">
                            <td class="px-12 py-10">
                                <div class="text-xl font-black text-indigo-950 tracking-tighter group-hover:text-indigo-600 transition-colors">{{ $s->nomor_surat }}</div>
                                <div class="flex items-center gap-3 mt-2">
                                    <span class="text-[10px] font-black text-indigo-300 uppercase tracking-[0.2em]">{{ \Carbon\Carbon::parse($s->tanggal_surat)->translatedFormat('d M Y') }}</span>
                                    <span class="w-1 h-1 bg-indigo-200 rounded-full"></span>
                                    <span class="text-[10px] font-bold text-indigo-200 uppercase tracking-widest">Sistem Digital</span>
                                </div>
                            </td>
                            <td class="px-8 py-10">
                                <div class="text-lg font-black text-indigo-900 tracking-tight">{{ $s->penduduk->nama }}</div>
                                <div class="text-xs font-bold text-indigo-300/60 mt-0.5">{{ $s->penduduk->nik }}</div>
                            </td>
                            <td class="px-8 py-10 text-center">
                                <span class="px-5 py-2.5 bg-indigo-50 text-indigo-600 rounded-2xl text-[10px] font-black uppercase tracking-widest border border-indigo-100/50 shadow-inner">
                                    {{ $s->template->nama_template }}
                                </span>
                            </td>
                            <td class="px-8 py-10 text-center">
                                @if($s->status == 'dicetak')
                                    <div class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-50 text-emerald-600 rounded-2xl text-[10px] font-black uppercase tracking-widest border border-emerald-100 shadow-sm">
                                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                                        DICETAK
                                    </div>
                                @elseif($s->status == 'selesai')
                                    <div class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-indigo-600/30">
                                        SIAP TERBIT
                                    </div>
                                @else
                                    <div class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-100 text-gray-400 rounded-2xl text-[10px] font-black uppercase tracking-widest border border-gray-200">
                                        DRAFT
                                    </div>
                                @endif
                            </td>
                            <td class="px-12 py-10 text-right">
                                <div class="flex justify-end gap-4 opacity-30 group-hover:opacity-100 transition-all duration-500 scale-95 group-hover:scale-100">
                                    <a href="{{ route('surat.download', $s) }}" class="w-14 h-14 flex items-center justify-center bg-emerald-500 text-white rounded-[1.25rem] shadow-xl shadow-emerald-500/30 hover:bg-emerald-600 hover:-translate-y-1 transition-all duration-300" title="Unduh Arsip PDF">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    </a>
                                    <form action="{{ route('surat.destroy', $s) }}" method="POST" onsubmit="return confirm('Hapus arsip surat ini dari sistem?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-14 h-14 flex items-center justify-center bg-white border-2 border-rose-50 text-rose-300 rounded-[1.25rem] hover:bg-rose-600 hover:text-white hover:border-rose-600 transition-all duration-300 shadow-sm" title="Pemusnahan Digital">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-40">
                                <div class="flex flex-col items-center justify-center opacity-30">
                                    <div class="w-24 h-24 bg-indigo-50 rounded-full flex items-center justify-center mb-8">
                                         <svg class="w-12 h-12 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0l-2.586 2.586a2 2 0 01-2.828 0L12 14l-2.586 2.586a2 2 0 01-2.828 0L4 13"></path></svg>
                                    </div>
                                    <p class="text-indigo-950 font-black uppercase tracking-[0.2em] text-xs italic">Nihil data dalam arsip digital</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Enhanced Footer Pagination -->
            <div class="px-12 py-12 bg-indigo-950/5 border-t border-indigo-950/10">
                <div class="flex items-center justify-between">
                    {{ $surats->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
