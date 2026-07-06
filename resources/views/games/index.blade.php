@extends('layouts.app')

@section('title', 'Partidos')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <div class="flex items-center gap-3">
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Partidos</h1>
            <span class="px-2.5 py-0.5 bg-violet-100 text-violet-700 text-xs font-semibold rounded-full">{{ $games->count() }} registrados</span>
        </div>
        <p class="text-gray-500 text-sm mt-1">Calendario de partidos de la liga</p>
    </div>
    <a href="{{ route('games.create') }}" class="btn inline-flex items-center gap-2 px-5 py-2.5 bg-violet-600 text-white rounded-xl text-sm font-bold hover:bg-violet-700 shadow-lg shadow-violet-600/25">
        <i class="fas fa-plus"></i> Nuevo Partido
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
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Local</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">vs</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Visitante</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Fecha</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Marcador</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($games as $game)
                <tr class="table-row">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-sm flex-shrink-0">
                                <span class="text-white font-bold text-xs">{{ substr($game->homeTeam->name ?? '?', 0, 2) }}</span>
                            </div>
                            <span class="font-semibold text-gray-900 text-sm">{{ $game->homeTeam->name ?? '—' }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="text-xs font-bold text-gray-300 tracking-wider">VS</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center shadow-sm flex-shrink-0">
                                <span class="text-white font-bold text-xs">{{ substr($game->awayTeam->name ?? '?', 0, 2) }}</span>
                            </div>
                            <span class="font-semibold text-gray-900 text-sm">{{ $game->awayTeam->name ?? '—' }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        <span class="inline-flex items-center gap-1.5"><i class="far fa-calendar text-gray-400 text-xs"></i> {{ $game->match_date->format('d/m/Y H:i') }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        @if ($game->home_score !== null && $game->away_score !== null)
                            <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-gray-50 rounded-lg text-base font-extrabold text-gray-900">{{ $game->home_score }}<span class="text-gray-300 font-normal">-</span>{{ $game->away_score }}</span>
                        @else
                            <span class="text-gray-300 text-sm">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        @php
                            $statusStyle = [
                                'programado' => ['bg-amber-50 text-amber-700 border-amber-200', 'fa-clock'],
                                'jugado' => ['bg-emerald-50 text-emerald-700 border-emerald-200', 'fa-check'],
                                'cancelado' => ['bg-red-50 text-red-700 border-red-200', 'fa-times'],
                            ];
                            [$sClass, $sIcon] = $statusStyle[$game->status] ?? ['bg-gray-50 text-gray-600 border-gray-200', 'fa-circle'];
                        @endphp
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold border {{ $sClass }}">
                            <i class="fas {{ $sIcon }} text-xs"></i>
                            {{ ucfirst($game->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right">
                        <a href="{{ route('games.edit', $game) }}"
                           class="btn inline-flex items-center gap-1.5 px-3.5 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-medium hover:bg-blue-100 mr-1.5"
                           title="Editar partido">
                            <i class="fas fa-edit text-xs"></i>
                            <span class="hidden sm:inline">Editar</span>
                        </a>
                        <form action="{{ route('games.destroy', $game) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('¿Eliminar este partido?')"
                                    class="btn inline-flex items-center gap-1.5 px-3.5 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100"
                                    title="Eliminar partido">
                                <i class="fas fa-trash text-xs"></i>
                                <span class="hidden sm:inline">Eliminar</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-20 text-center">
                        <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center mx-auto mb-4"><i class="fas fa-trophy text-gray-400 text-2xl"></i></div>
                        <p class="text-sm font-semibold text-gray-500">No hay partidos registrados</p>
                        <p class="text-xs text-gray-400 mt-1">Programa el primer partido para comenzar</p>
                        <a href="{{ route('games.create') }}" class="btn mt-4 inline-flex items-center gap-2 px-4 py-2 bg-violet-600 text-white rounded-lg text-sm font-medium hover:bg-violet-700">+ Crear partido</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection