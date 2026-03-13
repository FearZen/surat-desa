<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8">
            <div>
                <h2 class="text-4xl font-black text-indigo-950 tracking-tight leading-tight mb-2">
                    Katalog <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Template</span>
                </h2>
                <p class="text-indigo-900/40 font-bold text-xs uppercase tracking-[0.2em]">Otomasi Format Surat Desa Digital</p>
            </div>
            <div>
                <a href="{{ route('template.create') }}" class="group/btn relative inline-flex items-center gap-3 px-10 py-5 bg-indigo-950 text-white rounded-[2rem] font-black text-sm tracking-widest uppercase hover:bg-indigo-900 transition-all duration-300 shadow-2xl shadow-indigo-950/20 overflow-hidden">
                    <div class="absolute inset-0 bg-indigo-600 -translate-x-full group-hover/btn:translate-x-0 transition-transform duration-500"></div>
                    <svg class="w-5 h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span class="relative z-10">Desain Template Baru</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse($templates as $t)
        <div class="glass rounded-[3.5rem] p-10 shadow-3xl shadow-indigo-950/5 hover:bg-white hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden border border-white/50">
            <div class="absolute -right-10 -top-10 w-40 h-40 bg-indigo-50/50 rounded-full blur-3xl group-hover:bg-indigo-100 transition-colors duration-700"></div>
            
            <div class="relative z-10">
                <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-3xl flex items-center justify-center mb-10 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-500 shadow-inner group-hover:shadow-indigo-900/40">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                
                <h3 class="text-2xl font-black text-indigo-950 mb-3 tracking-tight group-hover:text-indigo-600 transition-colors">{{ $t->nama_template }}</h3>
                <p class="text-indigo-900/40 font-bold text-[10px] uppercase tracking-widest mb-4">Administrasi Desa</p>
                <p class="text-sm font-medium text-indigo-900/60 leading-relaxed mb-10 line-clamp-3 italic opacity-80 group-hover:opacity-100 transition-opacity">"{{ Str::limit(strip_tags($t->isi_template), 120) }}"</p>
                
                <div class="flex items-center justify-between pt-8 border-t border-indigo-50">
                    <div class="flex gap-4">
                        <a href="{{ route('template.edit', $t) }}" class="w-12 h-12 flex items-center justify-center bg-white border border-indigo-50 text-indigo-400 rounded-2xl hover:bg-indigo-600 hover:text-white hover:border-indigo-600 transition-all duration-300 shadow-sm" title="Edit Template">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </a>
                        <form action="{{ route('template.destroy', $t) }}" method="POST" onsubmit="return confirm('Hapus template ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-12 h-12 flex items-center justify-center bg-white border border-rose-50 text-rose-300 rounded-2xl hover:bg-rose-600 hover:text-white hover:border-rose-600 transition-all duration-300 shadow-sm" title="Hapus Template">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                    <a href="{{ route('surat.create', ['template_id' => $t->id]) }}" class="group/link flex items-center gap-2 text-xs font-black text-indigo-600 uppercase tracking-widest hover:text-indigo-800 transition-all">
                        Gunakan
                        <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-32 glass rounded-[3.5rem] border-2 border-dashed border-indigo-100 flex flex-col items-center justify-center opacity-50">
            <div class="w-20 h-20 bg-indigo-50 rounded-full flex items-center justify-center mb-6">
                 <svg class="w-10 h-10 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
            </div>
            <p class="text-indigo-900 font-black uppercase tracking-widest text-xs italic">Belum ada template terdaftar</p>
        </div>
        @endforelse
    </div>

    <div class="mt-16">
        {{ $templates->links() }}
    </div>
</x-app-layout>
