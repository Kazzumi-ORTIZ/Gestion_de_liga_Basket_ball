@extends('layouts.app')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Encabezado -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold flex items-center gap-3">
                <span class="text-5xl">⚔️</span> Partidos
            </h1>
            <a href="{{ route('games.create') }}" class="bg-purple-600 hover:bg-purple-700 px-8 py-4 rounded-2xl font-medium flex items-center gap-2">
                + Nuevo Partido
            </a>
        </div>

        <!-- Tabla de Partidos -->
        <div class="bg-white/10 backdrop-blur-xl rounded-3xl overflow-hidden border border-white/10">
            <table class="min-w-full">
                <thead class="bg-white/5">
                    <tr>
                        <th class="px-8 py-6 text-left text-lg">Local</th>
                        <th class="px-8 py-6 text-center text-lg">vs</th>
                        <th class="px-8 py-6 text-left text-lg">Visitante</th>
                        <th class="px-8 py-6 text-center text-lg">Fecha</th>
                        <th class="px-8 py-6 text-center text-lg">Marcador</th>
                        <th class="px-8 py-6 text-center text-lg">Estado</th>
                        <th class="px-8 py-6 text-center text-lg">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse ($games as $game)
                        <tr class="hover:bg-white/5 transition">
                            <td class="px-8 py-6 font-medium">{{ $game->homeTeam->name ?? '—' }}</td>
                            <td class="px-8 py-6 text-center text-3xl font-bold text-orange-400">VS</td>
                            <td class="px-8 py-6 font-medium">{{ $game->awayTeam->name ?? '—' }}</td>
                            <td class="px-8 py-6 text-center">{{ $game->match_date->format('d/m/Y H:i') }}</td>
                            <td class="px-8 py-6 text-center font-bold text-xl">{{ $game->home_score ?? '-' }} - {{ $game->away_score ?? '-' }}</td>
                            <td class="px-8 py-6 text-center">
                                <span class="px-5 py-2 rounded-full text-sm font-medium 
                                    @style([
                                        'bg-green-500' => $game->status === 'jugado',
                                        'bg-red-500' => $game->status === 'cancelado',
                                        'bg-yellow-500' => !in_array($game->status, ['jugado', 'cancelado']),
                                    ])">
                                    {{ ucfirst($game->status) }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <a href="{{ route('games.edit', $game) }}" class="text-blue-400 hover:text-blue-300 mr-6">Editar</a>
                                <form action="{{ route('games.destroy', $game) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('¿Eliminar?')" class="text-red-400 hover:text-red-300">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-8 py-20 text-center text-gray-400 text-lg">
                                No hay partidos registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection