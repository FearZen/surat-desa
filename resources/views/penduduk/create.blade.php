<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-6">
            <a href="{{ route('penduduk.index') }}" class="p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-indigo-600 transition-all duration-300 shadow-sm hover:shadow-md">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <div>
                <h2 class="font-extrabold text-3xl text-indigo-950 tracking-tight leading-tight">
                    Registrasi <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Warga Baru</span>
                </h2>
                <p class="text-indigo-900/40 font-bold text-xs uppercase tracking-[0.2em] mt-1">Sistem Pendataan Kependudukan Digital</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto">
        <div class="glass rounded-[3rem] shadow-4xl shadow-indigo-950/10 overflow-hidden border border-white/50">
            <form action="{{ route('penduduk.store') }}" method="POST" class="p-10 lg:p-16">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <!-- NIK -->
                    <div class="md:col-span-2">
                        <label for="nik" class="block text-[10px] font-black text-indigo-300 uppercase tracking-[0.3em] mb-4">Nomor Induk Kependudukan (NIK)</label>
                        <input type="text" id="nik" name="nik" value="{{ old('nik') }}" class="w-full px-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 rounded-[2rem] text-xl font-mono font-bold text-indigo-950 tracking-[0.1em] placeholder-indigo-200 transition-all duration-300" required placeholder="Masukkan 16 digit NIK...">
                        @error('nik') <p class="mt-3 text-xs font-bold text-rose-500 tracking-tight">{{ $message }}</p> @enderror
                    </div>

                    <!-- Nama LENGKAP -->
                    <div class="md:col-span-2">
                        <label for="nama" class="block text-[10px] font-black text-indigo-300 uppercase tracking-[0.3em] mb-4">Nama Lengkap Sesuai Identitas</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="w-full px-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 rounded-[2rem] text-lg font-bold text-indigo-950 transition-all duration-300" required placeholder="Masukkan nama lengkap...">
                        @error('nama') <p class="mt-3 text-xs font-bold text-rose-500 tracking-tight">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tempat Lahir -->
                    <div>
                        <label for="tempat_lahir" class="block text-[10px] font-black text-indigo-300 uppercase tracking-[0.3em] mb-4">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="w-full px-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 rounded-[2rem] font-bold text-indigo-950 transition-all duration-300" required>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="tanggal_lahir" class="block text-[10px] font-black text-indigo-300 uppercase tracking-[0.3em] mb-4">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full px-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 rounded-[2rem] font-bold text-indigo-950 transition-all duration-300" required>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label for="jenis_kelamin" class="block text-[10px] font-black text-indigo-300 uppercase tracking-[0.3em] mb-4">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="w-full px-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 rounded-[2rem] font-bold text-indigo-950 appearance-none transition-all duration-300 cursor-pointer" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <!-- Agama -->
                    <div>
                        <label for="agama" class="block text-[10px] font-black text-indigo-300 uppercase tracking-[0.3em] mb-4">Agama</label>
                        <input type="text" id="agama" name="agama" value="{{ old('agama', 'Islam') }}" class="w-full px-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 rounded-[2rem] font-bold text-indigo-950 transition-all duration-300" required>
                    </div>

                    <!-- Pekerjaan -->
                    <div>
                        <label for="pekerjaan" class="block text-[10px] font-black text-indigo-300 uppercase tracking-[0.3em] mb-4">Pekerjaan</label>
                        <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" class="w-full px-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 rounded-[2rem] font-bold text-indigo-950 transition-all duration-300" required>
                    </div>

                    <!-- Status Perkawinan -->
                    <div>
                        <label for="status_perkawinan" class="block text-[10px] font-black text-indigo-300 uppercase tracking-[0.3em] mb-4">Status Perkawinan</label>
                        <select id="status_perkawinan" name="status_perkawinan" class="w-full px-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 rounded-[2rem] font-bold text-indigo-950 appearance-none transition-all duration-300 cursor-pointer" required>
                            <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                        </select>
                    </div>

                    <!-- Alamat -->
                    <div class="md:col-span-2">
                        <label for="alamat" class="block text-[10px] font-black text-indigo-300 uppercase tracking-[0.3em] mb-4">Alamat Domisili Tetap</label>
                        <textarea id="alamat" name="alamat" rows="3" class="w-full px-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 rounded-[2.5rem] font-bold text-indigo-950 transition-all duration-300" required placeholder="Sesuai KTP...">{{ old('alamat') }}</textarea>
                    </div>

                    <!-- RT / RW -->
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <label for="rt" class="block text-[10px] font-black text-indigo-300 uppercase tracking-[0.3em] mb-4">RT</label>
                            <input type="text" id="rt" name="rt" value="{{ old('rt') }}" class="w-full px-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 rounded-[2rem] font-black text-center text-indigo-950 transition-all duration-300" required placeholder="000">
                        </div>
                        <div>
                            <label for="rw" class="block text-[10px] font-black text-indigo-300 uppercase tracking-[0.3em] mb-4">RW</label>
                            <input type="text" id="rw" name="rw" value="{{ old('rw') }}" class="w-full px-8 py-5 bg-white border-2 border-indigo-50/50 focus:border-indigo-500 rounded-[2rem] font-black text-center text-indigo-950 transition-all duration-300" required placeholder="000">
                        </div>
                    </div>
                </div>

                <div class="mt-20 flex flex-col sm:flex-row items-center justify-end gap-6 pt-12 border-t border-indigo-50/50">
                    <a href="{{ route('penduduk.index') }}" class="text-xs font-black text-indigo-300 hover:text-indigo-600 tracking-[0.2em] uppercase transition-colors">Batal</a>
                    <button type="submit" class="w-full sm:w-auto px-12 py-6 bg-indigo-950 text-white rounded-[2rem] font-black text-sm tracking-[0.2em] uppercase hover:bg-indigo-900 hover:-translate-y-1 transition-all duration-500 shadow-3xl shadow-indigo-950/20 flex items-center justify-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        Simpan Data Warga
                    </button>
                </div>
            </form>
        </div>
        
        <div class="mt-12 glass rounded-[3rem] p-10 flex items-center gap-8 border-indigo-100/30">
            <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-3xl flex items-center justify-center flex-shrink-0 animate-pulse">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <h4 class="text-indigo-950 font-black tracking-tight mb-1">Validasi Data</h4>
                <p class="text-indigo-900/40 text-sm font-medium leading-relaxed">Sistem akan melakukan pengecekan duplikasi NIK secara otomatis sebelum menyimpan. Pastikan data input akurat sesuai berkas kependudukan.</p>
            </div>
        </div>
    </div>
</x-app-layout>
