@extends('layouts.app')

@section('title', 'Clasificación')

@section('content')
<div class="mb-6">
    <div class="flex items-center gap-3">
        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Clasificación</h1>
        <span class="px-2.5 py-0.5 bg-amber-100 text-amber-700 text-xs font-semibold rounded-full">{{ count($standings ?? []) }} equipos</span>
    </div>
    <p class="text-gray-500 text-sm mt-1">Tabla de posiciones de la liga</p>
</div>

@if (count($standings ?? []) > 0)
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        @foreach ($standings->take(3) as $index => $team)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 text-center relative overflow-hidden card-hover">
            <div class="absolute top-0 right-0 w-24 h-24 rounded-full opacity-5 {{ $index == 0 ? 'bg-yellow-500' : ($index == 1 ? 'bg-gray-500' : 'bg-orange-500') }} -translate-y-1/2 translate-x-1/2"></div>
            <div class="relative">
                <div class="w-12 h-12 rounded-xl mx-auto mb-3 flex items-center justify-center text-2xl {{ $index == 0 ? 'bg-yellow-100' : ($index == 1 ? 'bg-gray-100' : 'bg-orange-100') }}">
                    {{ ['🥇', '🥈', '🥉'][$index] ?? '#' }}
                </div>
                <p class="text-lg font-bold text-gray-900">{{ $team['equipo'] }}</p>
                <div class="flex items-center justify-center gap-4 mt-3 text-sm">
                    <span><span class="font-bold text-gray-900">{{ $team['puntos'] }}</span> <span class="text-gray-400">pts</span></span>
                    <span class="text-gray-300">|</span>
                    <span><span class="font-medium text-gray-700">{{ $team['ganados'] }}G</span> <span class="text-gray-400">-</span> <span class="font-medium text-gray-700">{{ $team['perdidos'] }}P</span></span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-100">
            <thead>
                <tr class="bg-gray-50/80">
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Equipo</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider" title="Partidos Jugados">PJ</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider" title="Ganados">G</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider" title="Perdidos">P</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Puntos</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($standings ?? [] as $index => $team)
                <tr class="table-row">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center justify-center w-8 h-8 rounded-xl text-sm font-extrabold
                            {{ $index == 0 ? 'bg-yellow-100 text-yellow-700' : ($index == 1 ? 'bg-gray-200 text-gray-600' : ($index == 2 ? 'bg-orange-100 text-orange-700' : 'bg-gray-100 text-gray-500')) }}">
                            {{ $index + 1 }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-sm flex-shrink-0">
                                <span class="text-white font-bold text-sm">{{ substr($team['equipo'], 0, 2) }}</span>
                            </div>
                            <span class="font-semibold text-gray-900">{{ $team['equipo'] }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="text-sm font-semibold text-gray-900">{{ $team['jugados'] }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="text-sm font-bold text-emerald-600">{{ $team['ganados'] }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="text-sm font-bold text-red-500">{{ $team['perdidos'] }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-blue-50 text-blue-700 text-lg font-extrabold">{{ $team['puntos'] }}</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-20 text-center">
                        <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center mx-auto mb-4"><i class="fas fa-table text-gray-400 text-2xl"></i></div>
                        <p class="text-sm font-semibold text-gray-500">No hay datos de clasificación</p>
                        <p class="text-xs text-gray-400 mt-1">Los datos aparecerán cuando haya partidos jugados</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-5 bg-gradient-to-r from-amber-50 to-orange-50 border border-amber-200/60 rounded-2xl p-4 flex items-start gap-3">
    <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center flex-shrink-0"><i class="fas fa-info-circle text-amber-600 text-sm"></i></div>
    <div>
        <p class="text-sm font-semibold text-amber-900">Regla de puntuación</p>
        <p class="text-sm text-amber-800/80 mt-0.5">Se asignan <strong>2 puntos</strong> al ganador y <strong>1 punto</strong> al perdedor tras finalizar un partido.</p>
    </div>
</div>
@endsection