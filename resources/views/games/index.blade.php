@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50 min-h-screen text-gray-800 antialiased">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Encabezado -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 flex items-center gap-3">
                <span class="text-4xl">⚔️</span> Partidos
            </h1>
            <a href="{{ route('games.create') }}" 
               class="inline-flex items-center gap-2 bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-xl font-medium transition-colors shadow-sm shadow-purple-200 w-full sm:w-auto justify-center">
                <span>+</span> Nuevo Partido
            </a>
        </div>

        <!-- Tabla de Partidos (Con scroll horizontal adaptativo) -->
        <div class="bg-white shadow-sm rounded-2xl overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 table-fixed sm:table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Local</th>
                            <th scope="col" class="px-4 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider w-16">vs</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Visitante</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Fecha</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Marcador</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Estado</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($games as $game)
                            <tr class="hover:bg-gray-50/70 transition-colors">
                                <!-- Local -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                    {{ $game->homeTeam->name ?? '—' }}
                                </td >
                                <!-- Separador -->
                                <td class="px-4 py-4 whitespace-nowrap text-center text-sm font-bold text-orange-500 bg-orange-50/50 rounded-lg">
                                    VS
                                </td>
                                <!-- Visitante -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                    {{ $game->awayTeam->name ?? '—' }}
                                </td>
                                <!-- Fecha -->
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-600">
                                    {{ $game->match_date->format('d/m/Y H:i') }}
                                </td>
                                <!-- Marcador -->
                                <td class="px-6 py-4 whitespace-nowrap text-center font-bold text-base text-gray-900">
                                    {{ $game->home_score ?? '-' }} — {{ $game->away_score ?? '-' }}
                                </td>
                                <!-- Estado -->
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span @class([
                                        'px-3 py-1 rounded-full text-xs font-semibold inline-block',
                                        'bg-green-100 text-green-800 border border-green-200' => $game->status === 'jugado',
                                        'bg-red-100 text-red-800 border border-red-200' => $game->status === 'cancelado',
                                        'bg-yellow-100 text-yellow-800 border border-yellow-200' => !in_array($game->status, ['jugado', 'cancelado']),
                                    ])>
                                        {{ ucfirst($game->status) }}
                                    </span>
                                </td>
                                <!-- Acciones -->
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="{{ route('games.edit', $game) }}" 
                                           class="text-purple-600 hover:text-purple-900 transition-colors">
                                            Editar
                                        </a>
                                        <form action="{{ route('games.destroy', $game) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este partido?')" 
                                                    class="text-red-600 hover:text-red-900 transition-colors">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-16 text-center text-gray-400 text-sm">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <span class="text-3xl">🏀</span>
                                        <span>No hay partidos registrados todavía.</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection