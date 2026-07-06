<aside class="sidebar fixed top-0 left-0 h-full w-64 bg-gradient-to-b from-gray-900 via-gray-900 to-gray-800 text-white z-50 overflow-y-auto md:translate-x-0 shadow-2xl shadow-black/20">
    <div class="flex items-center gap-3 px-6 h-20 border-b border-white/5">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-xl shadow-lg shadow-blue-500/30 flex-shrink-0">
            🏀
        </div>
        <div>
            <p class="text-base font-bold leading-tight tracking-tight">Liga de</p>
            <p class="text-base font-bold leading-tight text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-400">Básquetbol</p>
        </div>
    </div>

    <div class="px-4 pt-6 pb-4">
        <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-widest">Navegación</p>
    </div>

    <nav class="px-3 pb-6 space-y-0.5">
        <a href="{{ route('dashboard') }}"
           class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('dashboard') ? 'active bg-blue-600/20 text-blue-300' : 'text-gray-300 hover:text-white hover:bg-white/5' }}">
            <i class="fas fa-home w-5 text-center text-base {{ request()->routeIs('dashboard') ? 'text-blue-400' : 'text-gray-500' }}"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('teams.index') }}"
           class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('teams.*') ? 'active bg-blue-600/20 text-blue-300' : 'text-gray-300 hover:text-white hover:bg-white/5' }}">
            <i class="fas fa-users w-5 text-center text-base {{ request()->routeIs('teams.*') ? 'text-blue-400' : 'text-gray-500' }}"></i>
            <span>Equipos</span>
        </a>
        <a href="{{ route('players.index') }}"
           class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('players.*') ? 'active bg-blue-600/20 text-blue-300' : 'text-gray-300 hover:text-white hover:bg-white/5' }}">
            <i class="fas fa-user w-5 text-center text-base {{ request()->routeIs('players.*') ? 'text-blue-400' : 'text-gray-500' }}"></i>
            <span>Jugadores</span>
        </a>
        <a href="{{ route('games.index') }}"
           class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('games.*') ? 'active bg-blue-600/20 text-blue-300' : 'text-gray-300 hover:text-white hover:bg-white/5' }}">
            <i class="fas fa-trophy w-5 text-center text-base {{ request()->routeIs('games.*') ? 'text-blue-400' : 'text-gray-500' }}"></i>
            <span>Partidos</span>
        </a>
        <a href="{{ route('standings.index') }}"
           class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('standings.*') ? 'active bg-blue-600/20 text-blue-300' : 'text-gray-300 hover:text-white hover:bg-white/5' }}">
            <i class="fas fa-table w-5 text-center text-base {{ request()->routeIs('standings.*') ? 'text-blue-400' : 'text-gray-500' }}"></i>
            <span>Clasificación</span>
        </a>
    </nav>

    <div class="px-4 py-4 border-t border-white/5 mt-auto md:hidden">
        <button onclick="toggleSidebar()" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-white/5 rounded-lg text-sm text-gray-300 hover:bg-white/10 transition">
            <i class="fas fa-times"></i> Cerrar menú
        </button>
    </div>
</aside>