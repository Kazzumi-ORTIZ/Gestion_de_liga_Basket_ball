@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <div class="flex items-center gap-3 mb-1">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">Dashboard</h1>
        <span class="px-2.5 py-0.5 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">Admin</span>
    </div>
    <p class="text-gray-500">Bienvenido de nuevo, <span class="font-medium text-gray-700">{{ auth()->user()->name ?? 'Usuario' }}</span></p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    <div class="card-hover bg-white rounded-2xl shadow-sm border border-gray-100 p-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg shadow-blue-500/25">
                    <i class="fas fa-users text-white text-lg"></i>
                </div>
                <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full">+{{ rand(0,5) }}%</span>
            </div>
            <p class="text-sm font-medium text-gray-500">Equipos</p>
            <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Team::count() }}</p>
            <a href="{{ route('teams.index') }}" class="mt-3 inline-flex items-center gap-1 text-sm text-blue-600 hover:text-blue-700 font-medium">
                Gestionar <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>

    <div class="card-hover bg-white rounded-2xl shadow-sm border border-gray-100 p-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow-lg shadow-emerald-500/25">
                    <i class="fas fa-user text-white text-lg"></i>
                </div>
                <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full">+{{ rand(0,8) }}%</span>
            </div>
            <p class="text-sm font-medium text-gray-500">Jugadores</p>
            <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Player::count() }}</p>
            <a href="{{ route('players.index') }}" class="mt-3 inline-flex items-center gap-1 text-sm text-emerald-600 hover:text-emerald-700 font-medium">
                Gestionar <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>

    <div class="card-hover bg-white rounded-2xl shadow-sm border border-gray-100 p-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-violet-50 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-500 to-violet-600 flex items-center justify-center shadow-lg shadow-violet-500/25">
                    <i class="fas fa-trophy text-white text-lg"></i>
                </div>
                <span class="text-xs font-medium text-violet-600 bg-violet-50 px-2.5 py-1 rounded-full">{{ \App\Models\Game::where('status', 'jugado')->count() }} jugados</span>
            </div>
            <p class="text-sm font-medium text-gray-500">Partidos</p>
            <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Game::count() }}</p>
            <a href="{{ route('games.index') }}" class="mt-3 inline-flex items-center gap-1 text-sm text-violet-600 hover:text-violet-700 font-medium">
                Gestionar <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>

    <div class="card-hover bg-white rounded-2xl shadow-sm border border-gray-100 p-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-amber-50 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-500 to-orange-500 flex items-center justify-center shadow-lg shadow-amber-500/25">
                    <i class="fas fa-list-ol text-white text-lg"></i>
                </div>
                <span class="text-xs font-medium text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full">Tabla</span>
            </div>
            <p class="text-sm font-medium text-gray-500">Clasificación</p>
            <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Team::count() }} equipos</p>
            <a href="{{ route('standings.index') }}" class="mt-3 inline-flex items-center gap-1 text-sm text-amber-600 hover:text-amber-700 font-medium">
                Ver tabla <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-8">
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-lg font-bold text-gray-900">Últimos Partidos</h2>
            <a href="{{ route('games.index') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Ver todos <i class="fas fa-arrow-right ml-1 text-xs"></i></a>
        </div>
        @php
            $recentGames = \App\Models\Game::with(['homeTeam', 'awayTeam'])
                ->orderBy('match_date', 'desc')
                ->take(5)
                ->get();
        @endphp
        @if ($recentGames->count() > 0)
            <div class="space-y-2">
                @foreach ($recentGames as $game)
                <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition">
                    <div class="flex-1 flex items-center justify-between min-w-0">
                        <div class="flex items-center gap-3 min-w-0 flex-1">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-bold text-xs">{{ substr($game->homeTeam->name ?? '?', 0, 2) }}</span>
                            </div>
                            <span class="text-sm font-medium text-gray-900 truncate">{{ $game->homeTeam->name ?? '—' }}</span>
                        </div>
                        <div class="flex items-center gap-3 px-4">
                            @if ($game->home_score !== null)
                                <span class="text-lg font-extrabold text-gray-900 min-w-[60px] text-center">{{ $game->home_score }} - {{ $game->away_score }}</span>
                            @else
                                <span class="text-sm text-gray-400 min-w-[60px] text-center">vs</span>
                            @endif
                        </div>
                        <div class="flex items-center gap-3 min-w-0 flex-1 justify-end">
                            <span class="text-sm font-medium text-gray-900 truncate">{{ $game->awayTeam->name ?? '—' }}</span>
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-bold text-xs">{{ substr($game->awayTeam->name ?? '?', 0, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <span class="text-xs text-gray-400">{{ $game->match_date->format('d/m/Y') }}</span>
                        @php
                            $statusColor = ['programado' => 'bg-amber-100 text-amber-700', 'jugado' => 'bg-emerald-100 text-emerald-700', 'cancelado' => 'bg-red-100 text-red-700'];
                        @endphp
                        <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $statusColor[$game->status] ?? 'bg-gray-100 text-gray-600' }}">{{ ucfirst($game->status) }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 text-gray-400">
                <i class="fas fa-calendar-alt text-4xl mb-3"></i>
                <p class="text-sm font-medium">No hay partidos registrados</p>
            </div>
        @endif
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-lg font-bold text-gray-900">Acciones Rápidas</h2>
        </div>
        <div class="space-y-3">
            <a href="{{ route('teams.create') }}" class="btn flex items-center gap-3 p-3.5 rounded-xl bg-gradient-to-r from-blue-50 to-blue-50/50 hover:from-blue-100 hover:to-blue-50 border border-blue-100 group">
                <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center shadow-sm group-hover:shadow-md transition"><i class="fas fa-plus text-white text-sm"></i></div>
                <div><p class="text-sm font-semibold text-gray-900">Nuevo Equipo</p><p class="text-xs text-gray-500">Agregar equipo a la liga</p></div>
            </a>
            <a href="{{ route('players.create') }}" class="btn flex items-center gap-3 p-3.5 rounded-xl bg-gradient-to-r from-emerald-50 to-emerald-50/50 hover:from-emerald-100 hover:to-emerald-50 border border-emerald-100 group">
                <div class="w-10 h-10 rounded-lg bg-emerald-600 flex items-center justify-center shadow-sm group-hover:shadow-md transition"><i class="fas fa-plus text-white text-sm"></i></div>
                <div><p class="text-sm font-semibold text-gray-900">Nuevo Jugador</p><p class="text-xs text-gray-500">Registrar jugador</p></div>
            </a>
            <a href="{{ route('games.create') }}" class="btn flex items-center gap-3 p-3.5 rounded-xl bg-gradient-to-r from-violet-50 to-violet-50/50 hover:from-violet-100 hover:to-violet-50 border border-violet-100 group">
                <div class="w-10 h-10 rounded-lg bg-violet-600 flex items-center justify-center shadow-sm group-hover:shadow-md transition"><i class="fas fa-plus text-white text-sm"></i></div>
                <div><p class="text-sm font-semibold text-gray-900">Nuevo Partido</p><p class="text-xs text-gray-500">Programar partido</p></div>
            </a>
            <a href="{{ route('standings.index') }}" class="btn flex items-center gap-3 p-3.5 rounded-xl bg-gradient-to-r from-amber-50 to-amber-50/50 hover:from-amber-100 hover:to-amber-50 border border-amber-100 group">
                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-amber-500 to-orange-500 flex items-center justify-center shadow-sm group-hover:shadow-md transition"><i class="fas fa-list-ol text-white text-sm"></i></div>
                <div><p class="text-sm font-semibold text-gray-900">Clasificación</p><p class="text-xs text-gray-500">Ver tabla de posiciones</p></div>
            </a>
        </div>
    </div>
</div>
@endsection