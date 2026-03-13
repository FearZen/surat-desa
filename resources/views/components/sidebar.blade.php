<aside id="sidebar" class="fixed top-6 left-6 z-50 w-72 h-[calc(100vh-3rem)] transition-transform -translate-x-full sm:translate-x-0 group/sidebar" aria-label="Sidebar">
   <div class="h-full px-6 py-10 overflow-y-auto glass-dark sidebar-gradient rounded-[2.5rem] shadow-2xl shadow-indigo-900/40 border border-white/10 flex flex-col relative overflow-hidden">
      <!-- Decor Background -->
      <div class="absolute -top-24 -left-24 w-64 h-64 bg-indigo-600/20 rounded-full blur-3xl pointer-events-none"></div>
      <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-purple-600/20 rounded-full blur-3xl pointer-events-none"></div>

      <div class="relative flex items-center mb-16 px-2">
         <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center mr-4 shadow-xl shadow-indigo-900/50 group-hover/sidebar:rotate-6 transition-transform duration-500">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
         </div>
         <div class="overflow-hidden">
            <span class="text-2xl font-black tracking-tight block text-white leading-tight">SISTEM DESA</span>
            <p class="text-[10px] text-indigo-400 font-black uppercase tracking-[0.3em] truncate mt-0.5">Digital Bakti</p>
         </div>
      </div>

      <nav class="relative space-y-3 font-medium flex-grow">
         <a href="{{ route('dashboard') }}" class="flex items-center p-4 rounded-[1.5rem] transition-all duration-300 group {{ request()->routeIs('dashboard') ? 'bg-white text-indigo-950 shadow-xl shadow-indigo-950/20' : 'text-indigo-100 hover:bg-white/5 hover:text-white' }}">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center mr-4 {{ request()->routeIs('dashboard') ? 'bg-indigo-100 text-indigo-600' : 'bg-white/5 text-indigo-200 group-hover:bg-indigo-500 group-hover:text-white' }} transition-colors duration-300">
               <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            </div>
            <span class="font-bold text-sm tracking-wide">Dashboard</span>
         </a>

         <a href="{{ route('penduduk.index') }}" class="flex items-center p-4 rounded-[1.5rem] transition-all duration-300 group {{ request()->routeIs('penduduk.*') ? 'bg-white text-indigo-950 shadow-xl shadow-indigo-950/20' : 'text-indigo-100 hover:bg-white/5 hover:text-white' }}">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center mr-4 {{ request()->routeIs('penduduk.*') ? 'bg-indigo-100 text-indigo-600' : 'bg-white/5 text-indigo-200 group-hover:bg-indigo-500 group-hover:text-white' }} transition-colors duration-300">
               <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a7 7 0 017 7v1H1v-1a7 7 0 017-7z"></path></svg>
            </div>
            <span class="font-bold text-sm tracking-wide">Data Penduduk</span>
         </a>

         <a href="{{ route('template.index') }}" class="flex items-center p-4 rounded-[1.5rem] transition-all duration-300 group {{ request()->routeIs('template.*') ? 'bg-white text-indigo-950 shadow-xl shadow-indigo-950/20' : 'text-indigo-100 hover:bg-white/5 hover:text-white' }}">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center mr-4 {{ request()->routeIs('template.*') ? 'bg-indigo-100 text-indigo-600' : 'bg-white/5 text-indigo-200 group-hover:bg-indigo-500 group-hover:text-white' }} transition-colors duration-300">
               <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
            </div>
            <span class="font-bold text-sm tracking-wide">Template Surat</span>
         </a>

         <a href="{{ route('surat.create') }}" class="flex items-center p-4 rounded-[1.5rem] transition-all duration-300 group {{ request()->routeIs('surat.create') ? 'bg-white text-indigo-950 shadow-xl shadow-indigo-950/20' : 'text-indigo-100 hover:bg-white/5 hover:text-white' }}">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center mr-4 {{ request()->routeIs('surat.create') ? 'bg-indigo-100 text-indigo-600' : 'bg-white/5 text-indigo-200 group-hover:bg-indigo-500 group-hover:text-white' }} transition-colors duration-300">
               <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
            </div>
            <span class="font-bold text-sm tracking-wide">Buat Surat</span>
         </a>

         <a href="{{ route('surat.index') }}" class="flex items-center p-4 rounded-[1.5rem] transition-all duration-300 group {{ request()->routeIs('surat.index') ? 'bg-white text-indigo-950 shadow-xl shadow-indigo-950/20' : 'text-indigo-100 hover:bg-white/5 hover:text-white' }}">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center mr-4 {{ request()->routeIs('surat.index') ? 'bg-indigo-100 text-indigo-600' : 'bg-white/5 text-indigo-200 group-hover:bg-indigo-500 group-hover:text-white' }} transition-colors duration-300">
               <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
            </div>
            <span class="font-bold text-sm tracking-wide">Arsip Surat</span>
         </a>

         @if(auth()->check() && auth()->user()->role === 'admin')
         <div class="pt-10 pb-4">
            <span class="px-6 text-[10px] font-black text-indigo-400 uppercase tracking-[0.3em] block">Administrator</span>
         </div>
         
         <a href="{{ route('user.index') }}" class="flex items-center p-4 rounded-[1.5rem] transition-all duration-300 group {{ request()->routeIs('user.*') ? 'bg-white text-indigo-950 shadow-xl shadow-indigo-950/20' : 'text-indigo-100 hover:bg-white/5 hover:text-white' }}">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center mr-4 {{ request()->routeIs('user.*') ? 'bg-indigo-100 text-indigo-600' : 'bg-white/5 text-indigo-200 group-hover:bg-indigo-500 group-hover:text-white' }} transition-colors duration-300">
               <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a7 7 0 017 7v1H1v-1a7 7 0 017-7z"></path></svg>
            </div>
            <span class="font-bold text-sm tracking-wide">Manajemen User</span>
         </a>

         <a href="{{ route('activity-log.index') }}" class="flex items-center p-4 rounded-[1.5rem] transition-all duration-300 group {{ request()->routeIs('activity-log.*') ? 'bg-white text-indigo-950 shadow-xl shadow-indigo-950/20' : 'text-indigo-100 hover:bg-white/5 hover:text-white' }}">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center mr-4 {{ request()->routeIs('activity-log.*') ? 'bg-indigo-100 text-indigo-600' : 'bg-white/5 text-indigo-200 group-hover:bg-indigo-500 group-hover:text-white' }} transition-colors duration-300">
               <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4H7a1 1 0 100 2h4a1 1 0 001-1V6z" clip-rule="evenodd"></path></svg>
            </div>
            <span class="font-bold text-sm tracking-wide">Log Aktivitas</span>
         </a>
         @endif
      </nav>

      <!-- Logout Component -->
      <div class="mt-auto pt-10 relative">
         <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center p-4 bg-white/5 border border-white/5 rounded-2xl text-rose-300 hover:bg-rose-500 hover:text-white transition-all duration-300 group shadow-lg">
               <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mr-4 group-hover:bg-rose-400">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
               </div>
               <span class="font-black text-xs uppercase tracking-widest">Logout Sistem</span>
            </button>
         </form>
      </div>
   </div>
</aside>
