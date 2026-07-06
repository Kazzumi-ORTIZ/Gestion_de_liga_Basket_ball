@extends('layouts.app')

@section('title', 'Nuevo Partido')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('games.index') }}" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-700 transition font-medium">
            <i class="fas fa-arrow-left text-xs"></i> Volver a partidos
        </a>
        <h1 class="text-2xl font-bold text-gray-900 tracking-tight mt-2">Nuevo Partido</h1>
        <p class="text-gray-500 text-sm mt-1">Programa un nuevo partido en la liga</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
        <form action="{{ route('games.store') }}" method="POST">
            @csrf

            <div class="space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="home_team_id" class="block text-sm font-semibold text-gray-700 mb-1.5">Equipo Local</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-home text-sm"></i></div>
                            <select name="home_team_id" id="home_team_id" required
                                    class="input-focus w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm bg-gray-50/50 focus:bg-white appearance-none">
                                <option value="">Seleccionar local...</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-chevron-down text-xs"></i></div>
                        </div>
                    </div>
                    <div>
                        <label for="away_team_id" class="block text-sm font-semibold text-gray-700 mb-1.5">Equipo Visitante</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-plane text-sm"></i></div>
                            <select name="away_team_id" id="away_team_id" required
                                    class="input-focus w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm bg-gray-50/50 focus:bg-white appearance-none">
                                <option value="">Seleccionar visitante...</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-chevron-down text-xs"></i></div>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="match_date" class="block text-sm font-semibold text-gray-700 mb-1.5">Fecha y Hora del Partido</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="far fa-calendar-alt text-sm"></i></div>
                        <input type="datetime-local" name="match_date" id="match_date" required
                               class="input-focus w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm bg-gray-50/50 focus:bg-white">
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                <a href="{{ route('games.index') }}" class="btn px-5 py-2.5 border border-gray-200 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-50">Cancelar</a>
                <button type="submit" class="btn px-6 py-2.5 bg-gradient-to-r from-violet-600 to-violet-700 text-white rounded-xl text-sm font-bold hover:from-violet-700 hover:to-violet-800 shadow-lg shadow-violet-600/25 flex items-center gap-2">
                    <i class="fas fa-save"></i> Crear Partido
                </button>
            </div>
        </form>
    </div>
</div>
@endsection