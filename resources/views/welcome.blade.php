@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="mb-8">
    <div class="flex items-center gap-3 mb-1">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">Panel de Control</h1>
        <span class="px-2.5 py-0.5 bg-gray-100 text-gray-600 text-xs font-semibold rounded-full">Inicio</span>
    </div>
    <p class="text-gray-500">Bienvenido, <span class="font-medium text-gray-700">{{ auth()->user()->name ?? 'Usuario' }}</span></p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    <div class="card-hover bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg shadow-blue-500/25 mb-4"><i class="fas fa-users text-white text-lg"></i></div>
        <p class="text-sm font-medium text-gray-500">Equipos</p>
        <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Team::count() }}</p>
        <a href="{{ route('teams.index') }}" class="mt-3 inline-flex items-center gap-1 text-sm text-blue-600 hover:text-blue-700 font-medium">Gestionar <i class="fas fa-arrow-right text-xs"></i></a>
    </div>
    <div class="card-hover bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow-lg shadow-emerald-500/25 mb-4"><i class="fas fa-user text-white text-lg"></i></div>
        <p class="text-sm font-medium text-gray-500">Jugadores</p>
        <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Player::count() }}</p>
        <a href="{{ route('players.index') }}" class="mt-3 inline-flex items-center gap-1 text-sm text-emerald-600 hover:text-emerald-700 font-medium">Gestionar <i class="fas fa-arrow-right text-xs"></i></a>
    </div>
    <div class="card-hover bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-500 to-violet-600 flex items-center justify-center shadow-lg shadow-violet-500/25 mb-4"><i class="fas fa-trophy text-white text-lg"></i></div>
        <p class="text-sm font-medium text-gray-500">Partidos</p>
        <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Game::count() }}</p>
        <a href="{{ route('games.index') }}" class="mt-3 inline-flex items-center gap-1 text-sm text-violet-600 hover:text-violet-700 font-medium">Gestionar <i class="fas fa-arrow-right text-xs"></i></a>
    </div>
    <div class="card-hover bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-500 to-orange-500 flex items-center justify-center shadow-lg shadow-amber-500/25 mb-4"><i class="fas fa-list-ol text-white text-lg"></i></div>
        <p class="text-sm font-medium text-gray-500">Clasificación</p>
        <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Team::count() }} equipos</p>
        <a href="{{ route('standings.index') }}" class="mt-3 inline-flex items-center gap-1 text-sm text-amber-600 hover:text-amber-700 font-medium">Ver tabla <i class="fas fa-arrow-right text-xs"></i></a>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
    <h2 class="text-lg font-bold text-gray-900 mb-5">Acceso Directo</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <a href="{{ route('teams.index') }}" class="btn flex items-center gap-4 p-4 bg-gradient-to-r from-blue-50 to-blue-50/50 rounded-xl hover:from-blue-100 border border-blue-100">
            <div class="w-11 h-11 rounded-lg bg-blue-600 flex items-center justify-center flex-shrink-0"><i class="fas fa-users text-white"></i></div>
            <div><p class="font-semibold text-gray-900 text-sm">Equipos</p><p class="text-xs text-gray-500">Gestionar equipos de la liga</p></div>
        </a>
        <a href="{{ route('players.index') }}" class="btn flex items-center gap-4 p-4 bg-gradient-to-r from-emerald-50 to-emerald-50/50 rounded-xl hover:from-emerald-100 border border-emerald-100">
            <div class="w-11 h-11 rounded-lg bg-emerald-600 flex items-center justify-center flex-shrink-0"><i class="fas fa-user text-white"></i></div>
            <div><p class="font-semibold text-gray-900 text-sm">Jugadores</p><p class="text-xs text-gray-500">Gestionar jugadores</p></div>
        </a>
        <a href="{{ route('games.index') }}" class="btn flex items-center gap-4 p-4 bg-gradient-to-r from-violet-50 to-violet-50/50 rounded-xl hover:from-violet-100 border border-violet-100">
            <div class="w-11 h-11 rounded-lg bg-violet-600 flex items-center justify-center flex-shrink-0"><i class="fas fa-trophy text-white"></i></div>
            <div><p class="font-semibold text-gray-900 text-sm">Partidos</p><p class="text-xs text-gray-500">Calendario y resultados</p></div>
        </a>
    </div>
</div>
@endsection