@extends('layouts.app')

@section('title', 'Jugadores')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <div class="flex items-center gap-3">
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Jugadores</h1>
            <span class="px-2.5 py-0.5 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full">{{ $players->count() }} registrados</span>
        </div>
        <p class="text-gray-500 text-sm mt-1">Listado de jugadores de la liga</p>
    </div>
    <a href="{{ route('players.create') }}" class="btn inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-600 text-white rounded-xl text-sm font-bold hover:bg-emerald-700 shadow-lg shadow-emerald-600/25">
        <i class="fas fa-plus"></i> Nuevo Jugador
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
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Equipo</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Posición</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($players as $player)
                <tr class="table-row">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow-sm flex-shrink-0">
                                <span class="text-white font-bold text-sm">{{ substr($player->name, 0, 2) }}</span>
                            </div>
                            <span class="font-semibold text-gray-900">{{ $player->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($player->team)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg text-xs font-medium">
                                <i class="fas fa-users text-gray-400"></i>
                                {{ $player->team->name }}
                            </span>
                        @else
                            <span class="text-gray-400 text-sm">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="inline-flex items-center justify-center w-9 h-9 bg-gray-100 rounded-xl text-sm font-extrabold text-gray-700">{{ $player->jersey_number }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $posColors = ['PG' => 'bg-blue-100 text-blue-700', 'SG' => 'bg-indigo-100 text-indigo-700', 'SF' => 'bg-violet-100 text-violet-700', 'PF' => 'bg-orange-100 text-orange-700', 'C' => 'bg-rose-100 text-rose-700'];
                            $posLabels = ['PG' => 'Base', 'SG' => 'Escolta', 'SF' => 'Alero', 'PF' => 'Ala-Pívot', 'C' => 'Pívot'];
                        @endphp
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold {{ $posColors[$player->position] ?? 'bg-gray-100 text-gray-700' }}">
                            {{ $posLabels[$player->position] ?? $player->position }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right">
                        <a href="{{ route('players.edit', $player) }}"
                           class="btn inline-flex items-center gap-1.5 px-3.5 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-medium hover:bg-blue-100 mr-1.5"
                           title="Editar jugador">
                            <i class="fas fa-edit text-xs"></i>
                            <span class="hidden sm:inline">Editar</span>
                        </a>
                        <form action="{{ route('players.destroy', $player) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('¿Eliminar jugador {{ $player->name }}?')"
                                    class="btn inline-flex items-center gap-1.5 px-3.5 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100"
                                    title="Eliminar jugador">
                                <i class="fas fa-trash text-xs"></i>
                                <span class="hidden sm:inline">Eliminar</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-20 text-center">
                        <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center mx-auto mb-4"><i class="fas fa-user text-gray-400 text-2xl"></i></div>
                        <p class="text-sm font-semibold text-gray-500">No hay jugadores registrados</p>
                        <p class="text-xs text-gray-400 mt-1">Registra el primer jugador para comenzar</p>
                        <a href="{{ route('players.create') }}" class="btn mt-4 inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 text-white rounded-lg text-sm font-medium hover:bg-emerald-700">+ Crear jugador</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection