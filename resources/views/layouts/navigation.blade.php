<nav x-data="{ open: false }" class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-indigo-50 dark:border-slate-800 sticky top-0 z-40 transition-colors duration-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Branding or Breadcrumb -->
                <div class="flex items-center gap-4">
                    <div class="p-2bg-indigo-50 rounded-lg sm:hidden">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </div>
                    <span class="text-sm font-black text-indigo-950/20 dark:text-white/10 uppercase tracking-[0.3em] hidden md:block transition-colors">Pemerintahan Desa Digital</span>
                </div>
            </div>

            <!-- Right Side -->
            <div class="flex items-center gap-4">
                <!-- Theme Toggle -->
                <button id="nav-theme-toggle" class="p-2.5 bg-slate-50 dark:bg-slate-800 text-slate-500 dark:text-slate-400 rounded-xl hover:scale-110 transition-all border border-indigo-50 dark:border-slate-700">
                    <svg id="nav-theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="nav-theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </button>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="64">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-5 py-3 border-2 border-indigo-50 dark:border-slate-800 rounded-2xl text-sm font-bold text-indigo-900 dark:text-white bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800 hover:border-indigo-100 dark:hover:border-slate-700 transition-all duration-300 shadow-sm">
                            <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center mr-3 text-white shadow-lg">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div class="text-left">
                                <p class="text-[10px] font-black uppercase tracking-widest text-indigo-400 leading-none mb-1">{{ ucfirst(Auth::user()->role) }}</p>
                                <p class="leading-none">{{ Auth::user()->name }}</p>
                            </div>

                            <div class="ml-4 text-indigo-300">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="p-2 space-y-1">
                            <x-dropdown-link :href="route('profile.edit')" class="rounded-xl font-bold text-indigo-900 hover:bg-indigo-50">
                                {{ __('Profil Akun') }}
                            </x-dropdown-link>

                            <div class="border-t border-indigo-50 my-1"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        class="rounded-xl font-bold text-rose-600 hover:bg-rose-50"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Keluar Sistem') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile Only) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-3 rounded-xl text-indigo-400 hover:text-indigo-600 hover:bg-indigo-50 transition duration-150 ease-in-out bg-white border border-indigo-50">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-indigo-50 overflow-hidden animate-fade-in-down">
        <div class="p-6 space-y-4">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-black text-xl">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="font-black text-indigo-950">{{ Auth::user()->name }}</p>
                    <p class="text-xs font-bold text-indigo-400 uppercase tracking-widest">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-2xl font-bold">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('penduduk.index')" :active="request()->routeIs('penduduk.*')" class="rounded-2xl font-bold">
                {{ __('Data Penduduk') }}
            </x-responsive-nav-link>

            <div class="border-t border-indigo-50 my-4"></div>

            <x-responsive-nav-link :href="route('profile.edit')" class="rounded-2xl font-bold">
                {{ __('Profil Saya') }}
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        class="rounded-2xl font-black text-rose-600"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Keluar dari Sistem') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>
<script>
    const navThemeToggleBtn = document.getElementById('nav-theme-toggle');
    const navDarkIcon = document.getElementById('nav-theme-toggle-dark-icon');
    const navLightIcon = document.getElementById('nav-theme-toggle-light-icon');

    function updateNavIcons() {
        if (document.documentElement.classList.contains('dark')) {
            navDarkIcon.classList.add('hidden');
            navLightIcon.classList.remove('hidden');
        } else {
            navDarkIcon.classList.remove('hidden');
            navLightIcon.classList.add('hidden');
        }
    }

    updateNavIcons();

    navThemeToggleBtn.addEventListener('click', () => {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
        updateNavIcons();
    });
</script>
