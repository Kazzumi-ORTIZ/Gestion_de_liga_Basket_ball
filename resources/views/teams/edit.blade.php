@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('teams.index') }}" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-700 transition font-medium">
            <i class="fas fa-arrow-left text-xs"></i> Volver a equipos
        </a>
        <h1 class="text-2xl font-bold text-gray-900 tracking-tight mt-2">Editar Equipo</h1>
        <p class="text-gray-500 text-sm mt-1">Modifica los datos del equipo</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
        <form action="{{ route('teams.update', $team) }}" method="POST">
            @csrf @method('PUT')

            <div class="space-y-5">
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5">Nombre del Equipo</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-users text-sm"></i></div>
                        <input type="text" name="name" id="name" value="{{ old('name', $team->name) }}" required
                               class="input-focus w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm bg-gray-50/50 focus:bg-white"
                               placeholder="Ej: Lakers">
                    </div>
                </div>

                <div>
                    <label for="city" class="block text-sm font-semibold text-gray-700 mb-1.5">Ciudad</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-map-marker-alt text-sm"></i></div>
                        <input type="text" name="city" id="city" value="{{ old('city', $team->city) }}" required
                               class="input-focus w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm bg-gray-50/50 focus:bg-white"
                               placeholder="Ej: Los Ángeles">
                    </div>
                </div>

                <div>
                    <label for="coach" class="block text-sm font-semibold text-gray-700 mb-1.5">Entrenador <span class="text-gray-400 font-normal">(opcional)</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-whistle text-sm"></i></div>
                        <input type="text" name="coach" id="coach" value="{{ old('coach', $team->coach) }}"
                               class="input-focus w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm bg-gray-50/50 focus:bg-white"
                               placeholder="Ej: Phil Jackson">
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                <a href="{{ route('teams.index') }}" class="btn px-5 py-2.5 border border-gray-200 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-50">Cancelar</a>
                <button type="submit" class="btn px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl text-sm font-bold hover:from-blue-700 hover:to-blue-800 shadow-lg shadow-blue-600/25 flex items-center gap-2">
                    <i class="fas fa-save"></i> Actualizar Equipo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection