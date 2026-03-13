<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-black text-white">Selamat Datang</h2>
        <p class="text-indigo-300/80 text-sm font-medium mt-1">Silakan masuk untuk mengelola data desa.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[10px] font-black uppercase tracking-widest text-indigo-400 mb-2 ml-1">Alamat Email</label>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-indigo-400 group-focus-within:text-indigo-300 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"></path></svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="block w-full pl-14 pr-4 py-4 bg-white/5 border border-white/10 rounded-2xl text-white placeholder-indigo-300/30 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition-all" placeholder="name@example.com">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-2 ml-1">
                <label for="password" class="block text-[10px] font-black uppercase tracking-widest text-indigo-400">Kata Sandi</label>
                @if (Route::has('password.request'))
                    <a class="text-[10px] font-black uppercase tracking-widest text-indigo-500 hover:text-indigo-400 transition-colors" href="{{ route('password.request') }}">
                        Lupa Sandi?
                    </a>
                @endif
            </div>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-indigo-400 group-focus-within:text-indigo-300 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <input id="password" type="password" name="password" required class="block w-full pl-14 pr-4 py-4 bg-white/5 border border-white/10 rounded-2xl text-white placeholder-indigo-300/30 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition-all" placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" class="w-4 h-4 rounded border-white/10 bg-white/5 text-indigo-600 focus:ring-indigo-500/50 focus:ring-offset-0 transition-all" name="remember">
            <label for="remember_me" class="ml-3 text-sm font-medium text-indigo-300/60 transition-colors hover:text-indigo-300 cursor-pointer">Ingat saya untuk sesi berikutnya</label>
        </div>

        <button type="submit" class="w-full py-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-black uppercase tracking-widest text-xs rounded-2xl shadow-xl shadow-indigo-500/20 transform hover:-translate-y-0.5 transition-all duration-300">
            Masuk ke Sistem
        </button>

        @if (Route::has('register'))
            <p class="text-center text-sm font-medium text-indigo-300/60 mt-8">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-indigo-400 font-bold hover:text-indigo-300 transition-colors ml-1">Daftar sekarang</a>
            </p>
        @endif
    </form>
</x-guest-layout>
