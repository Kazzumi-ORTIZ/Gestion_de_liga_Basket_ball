@extends('layouts.app')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold flex items-center gap-3">
                <span class="text-5xl">👟</span> Jugadores a
            </h1>
            <a href="{{ route('players.create') }}" class="bg-green-600 hover:bg-green-700 px-8 py-4 rounded-2xl font-medium flex items-center gap-2">
                + Nuevo Jugador
            </a>
        </div>

        <div class="bg-white/10 backdrop-blur-xl rounded-3xl overflow-hidden border border-white/10">
            <table class="min-w-full">
                <thead class="bg-white/5">
                    <tr>
                        <th class="px-8 py-6 text-left text-lg">Nombre</th>
                        <th class="px-8 py-6 text-left text-lg">Equipo</th>
                        <th class="px-8 py-6 text-center text-lg"># Camiseta</th>
                        <th class="px-8 py-6 text-left text-lg">Posición</th>
                        <th class="px-8 py-6 text-center text-lg">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse ($players as $player)
                    <tr class="hover:bg-white/5 transition">
                        <td class="px-8 py-6 font-semibold">{{ $player->name }}</td>
                        <td class="px-8 py-6">{{ $player->team->name ?? 'Sin equipo' }}</td>
                        <td class="px-8 py-6 text-center font-bold">{{ $player->jersey_number }}</td>
                        <td class="px-8 py-6">{{ $player->position }}</td>
                        <td class="px-8 py-6 text-center">
                            <a href="{{ route('players.edit', $player) }}" class="text-blue-400 hover:text-blue-300 mr-6">Editar</a>
                            <form action="{{ route('players.destroy', $player) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('¿Eliminar?')" class="text-red-400 hover:text-red-300">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="px-8 py-20 text-center text-gray-400 text-lg">No hay jugadores registrados</td></tr>
                    @endempty
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection