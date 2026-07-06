@extends('layouts.app')

@section('title', 'Editar Jugador')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('players.index') }}" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-700 transition font-medium">
            <i class="fas fa-arrow-left text-xs"></i> Volver a jugadores
        </a>
        <h1 class="text-2xl font-bold text-gray-900 tracking-tight mt-2">Editar Jugador</h1>
        <p class="text-gray-500 text-sm mt-1">Modifica los datos del jugador</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
        <form action="{{ route('players.update', $player) }}" method="POST">
            @csrf @method('PUT')

            <div class="space-y-5">
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5">Nombre Completo</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-user text-sm"></i></div>
                        <input type="text" name="name" id="name" value="{{ old('name', $player->name) }}" required
                               class="input-focus w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm bg-gray-50/50 focus:bg-white"
                               placeholder="Ej: Michael Jordan">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="jersey_number" class="block text-sm font-semibold text-gray-700 mb-1.5"># Camiseta</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-hashtag text-sm"></i></div>
                            <input type="text" name="jersey_number" id="jersey_number" value="{{ old('jersey_number', $player->jersey_number) }}" required
                                   class="input-focus w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm bg-gray-50/50 focus:bg-white"
                                   placeholder="Ej: 23">
                        </div>
                    </div>
                    <div>
                        <label for="position" class="block text-sm font-semibold text-gray-700 mb-1.5">Posición</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-basketball-ball text-sm"></i></div>
                            <select name="position" id="position" required
                                    class="input-focus w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm bg-gray-50/50 focus:bg-white appearance-none">
                                <option value="">Seleccionar...</option>
                                <option value="PG" {{ $player->position == 'PG' ? 'selected' : '' }}>Base (PG)</option>
                                <option value="SG" {{ $player->position == 'SG' ? 'selected' : '' }}>Escolta (SG)</option>
                                <option value="SF" {{ $player->position == 'SF' ? 'selected' : '' }}>Alero (SF)</option>
                                <option value="PF" {{ $player->position == 'PF' ? 'selected' : '' }}>Ala-Pívot (PF)</option>
                                <option value="C" {{ $player->position == 'C' ? 'selected' : '' }}>Pívot (C)</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-chevron-down text-xs"></i></div>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="team_id" class="block text-sm font-semibold text-gray-700 mb-1.5">Equipo</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-users text-sm"></i></div>
                        <select name="team_id" id="team_id" required
                                class="input-focus w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm bg-gray-50/50 focus:bg-white appearance-none">
                            <option value="">Selecciona un equipo...</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}" {{ $team->id == $player->team_id ? 'selected' : '' }}>{{ $team->name }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-chevron-down text-xs"></i></div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                <a href="{{ route('players.index') }}" class="btn px-5 py-2.5 border border-gray-200 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-50">Cancelar</a>
                <button type="submit" class="btn px-6 py-2.5 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white rounded-xl text-sm font-bold hover:from-emerald-700 hover:to-emerald-800 shadow-lg shadow-emerald-600/25 flex items-center gap-2">
                    <i class="fas fa-save"></i> Actualizar Jugador
                </button>
            </div>
        </form>
    </div>
</div>
@endsection