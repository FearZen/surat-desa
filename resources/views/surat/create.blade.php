<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-6">
            <a href="{{ route('surat.index') }}" class="p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-indigo-600 transition-all duration-300 shadow-sm hover:shadow-md">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <div>
                <h2 class="font-extrabold text-3xl text-gray-900 tracking-tight">
                    {{ __('Buat Surat Baru') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1 font-medium">Lengkapi formulir di bawah untuk menerbitkan surat resmi.</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-[2rem] shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
            <form action="{{ route('surat.store') }}" method="POST" class="p-10">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <!-- Nomor Surat -->
                    <div class="md:col-span-2">
                        <label for="nomor_surat" class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Nomor Surat Resmi</label>
                        <input type="text" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $nextNomorSurat) }}" class="w-full px-6 py-5 bg-gray-50 border-gray-100 focus:bg-white focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 rounded-2xl text-xl font-mono font-bold transition-all duration-300 shadow-sm" required placeholder="Masukkan nomor surat...">
                        @error('nomor_surat') <p class="mt-2 text-xs font-bold text-rose-500 tracking-tight">{{ $message }}</p> @enderror
                    </div>

                    <!-- Penduduk -->
                    <div class="md:col-span-2">
                        <label for="penduduk_id" class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Pilih Penduduk / Warga</label>
                        <div class="relative">
                            <select id="penduduk_id" name="penduduk_id" class="w-full px-6 py-5 bg-gray-50 border-gray-100 focus:bg-white focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 rounded-2xl font-bold transition-all duration-300 shadow-sm appearance-none" required>
                                <option value="">-- Cari Nama atau NIK --</option>
                                @foreach($penduduks as $p)
                                    <option value="{{ $p->id }}" {{ old('penduduk_id') == $p->id ? 'selected' : '' }}>{{ $p->nama }} ({{ $p->nik }})</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-6 pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                        @error('penduduk_id') <p class="mt-2 text-xs font-bold text-rose-500 tracking-tight">{{ $message }}</p> @enderror
                    </div>

                    <!-- Template -->
                    <div class="md:col-span-2">
                        <label for="template_id" class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Jenis Surat (Format Template)</label>
                        <div class="relative">
                            <select id="template_id" name="template_id" class="w-full px-6 py-5 bg-gray-50 border-gray-100 focus:bg-white focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 rounded-2xl font-bold transition-all duration-300 shadow-sm appearance-none" required>
                                <option value="">-- Pilih Format Surat --</option>
                                @foreach($templates as $t)
                                    <option value="{{ $t->id }}" {{ (old('template_id') == $t->id || request('template_id') == $t->id) ? 'selected' : '' }}>{{ $t->nama_template }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-6 pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                        @error('template_id') <p class="mt-2 text-xs font-bold text-rose-500 tracking-tight">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tanggal Surat -->
                    <div>
                        <label for="tanggal_surat" class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Tanggal Terbit</label>
                        <input type="date" id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat', now()->format('Y-m-d')) }}" class="w-full px-6 py-5 bg-gray-50 border-gray-100 focus:bg-white focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 rounded-2xl font-bold transition-all duration-300 shadow-sm" required>
                    </div>

                    <!-- Status Initial -->
                    <div>
                        <label for="status" class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Prioritas Status</label>
                        <div class="relative">
                            <select id="status" name="status" class="w-full px-6 py-5 bg-gray-50 border-gray-100 focus:bg-white focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 rounded-2xl font-bold transition-all duration-300 shadow-sm appearance-none">
                                <option value="draft">Draft (Simpan Sementara)</option>
                                <option value="selesai" selected>Selesai (Siap Terbit)</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-6 pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-14 flex flex-col sm:flex-row items-center justify-end gap-6 border-t border-gray-50 pt-10">
                    <a href="{{ route('surat.index') }}" class="text-sm font-black text-gray-400 hover:text-gray-600 tracking-widest uppercase transition-colors">Batalkan</a>
                    <button type="submit" class="w-full sm:w-auto px-10 py-5 bg-indigo-600 text-white rounded-2xl font-black text-sm tracking-widest uppercase hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-300 shadow-xl shadow-indigo-100 flex items-center justify-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        Terbitkan Surat
                    </button>
                </div>
            </form>
        </div>
        
        <div class="mt-10 bg-indigo-900 rounded-[2rem] p-10 text-white relative overflow-hidden shadow-2xl">
            <div class="absolute right-0 top-0 p-10 opacity-10">
                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
            </div>
            <div class="relative">
                <h3 class="text-xl font-black mb-6 tracking-tight">Penting!</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-indigo-100/80 text-sm leading-relaxed">
                    <p>Surat yang telah diterbitkan akan mendapatkan nomor unik dan tersimpan selamanya dalam basis data desa. Pastikan informasi penduduk sudah divalidasi dengan dokumen fisik sebelum menekan tombol Terbitkan.</p>
                    <p>Anda dapat mengunduh salinan PDF dari surat ini segera setelah proses penyimpanan berhasil di halaman konfirmasi atau melalui menu Arsip Surat di sidebar.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
