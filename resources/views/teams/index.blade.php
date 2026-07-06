@extends('layouts.app')

@section('title', 'Equipos')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <div class="flex items-center gap-3">
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Equipos</h1>
            <span class="px-2.5 py-0.5 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">{{ $teams->count() }} registrados</span>
        </div>
        <p class="text-gray-500 text-sm mt-1">Listado de equipos de la liga</p>
    </div>
    <a href="{{ route('teams.create') }}" class="btn inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-bold hover:bg-blue-700 shadow-lg shadow-blue-600/25">
        <i class="fas fa-plus"></i> Nuevo Equipo
    </a>
</div>

@if (session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-3.5 rounded-xl mb-6 flex items-center gap-3 shadow-sm">
        <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0"><i class="fas fa-check text-emerald-600 text-sm"></i></div>
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-100">
            <thead>
                <tr class="bg-gray-50/80">
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Ciudad</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Entrenador</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($teams as $team)
                <tr class="table-row">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-sm flex-shrink-0">
                                <span class="text-white font-bold text-sm">{{ substr($team->name, 0, 2) }}</span>
                            </div>
                            <div>
                                <span class="font-semibold text-gray-900">{{ $team->name }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center gap-1.5 text-sm text-gray-600">
                            <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                            {{ $team->city }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $team->coach ?? '—' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right">
                        <a href="{{ route('teams.edit', $team) }}"
                           class="btn inline-flex items-center gap-1.5 px-3.5 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-medium hover:bg-blue-100 mr-1.5"
                           title="Editar equipo">
                            <i class="fas fa-edit text-xs"></i>
                            <span class="hidden sm:inline">Editar</span>
                        </a>
                        <form action="{{ route('teams.destroy', $team) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('¿Eliminar equipo {{ $team->name }}?')"
                                    class="btn inline-flex items-center gap-1.5 px-3.5 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100"
                                    title="Eliminar equipo">
                                <i class="fas fa-trash text-xs"></i>
                                <span class="hidden sm:inline">Eliminar</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-20 text-center">
                        <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center mx-auto mb-4"><i class="fas fa-users text-gray-400 text-2xl"></i></div>
                        <p class="text-sm font-semibold text-gray-500">No hay equipos registrados</p>
                        <p class="text-xs text-gray-400 mt-1">Crea el primer equipo para comenzar</p>
                        <a href="{{ route('teams.create') }}" class="btn mt-4 inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700">+ Crear equipo</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection