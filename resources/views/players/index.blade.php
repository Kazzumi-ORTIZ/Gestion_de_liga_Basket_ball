@extends('layouts.app')

@section('content')
<div class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto">
        
        <!-- Encabezado de la Vista -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 flex items-center gap-3">
                    <span>👟</span> Jugadores Registrados
                </h1>
                <p class="mt-1 text-sm text-gray-500">Listado completo, posiciones y asignación de equipos de la liga.</p>
            </div>
            <a href="{{ route('players.create') }}" 
               class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl font-semibold transition-all shadow-sm shadow-green-200 w-full sm:w-auto justify-center">
                <span>+</span> Nuevo Jugador
            </a>
        </div>

        <!-- Mensajes de Estado del Sistema -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-xl text-green-700 text-sm font-medium shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla de Contenido -->
        <div class="bg-white shadow-sm rounded-2xl overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 whitespace-nowrap">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Equipo</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider"># Camiseta</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Posición</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($players as $player)
                            <tr class="hover:bg-gray-50/70 transition-colors">
                                <!-- Nombre -->
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-900">{{ $player->name }}</div>
                                </td>
                                
                                <!-- Equipo -->
                                <td class="px-6 py-4">
                                    @if($player->team)
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-sm font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                            🏀 {{ $player->team->name }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-sm font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                            Sin equipo
                                        </span>
                                    @endif
                                </td>
                                
                                <!-- Número de Camiseta -->
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-block bg-green-50 text-green-700 font-bold px-3 py-1 rounded-full text-sm border border-green-100">
                                        {{ str_pad($player->jersey_number, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </td>
                                
                                <!-- Posición -->
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                                        {{ $player->position }}
                                    </span>
                                </td>
                                
                                <!-- Acciones del CRUD -->
                                <td class="px-6 py-4 text-center text-sm font-medium">
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="{{ route('players.edit', $player) }}" 
                                           class="text-sm font-semibold text-green-600 hover:text-green-700 transition-colors bg-green-50 hover:bg-green-100/70 px-3 py-1.5 rounded-lg">
                                            Editar
                                        </a>
                                        <form action="{{ route('players.destroy', $player) }}" method="POST" class="inline">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('¿Estás seguro de que deseas eliminar a este jugador?')" 
                                                    class="text-sm font-semibold text-red-600 hover:text-red-700 transition-colors bg-red-50 hover:bg-red-100/70 px-3 py-1.5 rounded-lg">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="text-gray-400 text-5xl mb-3">📋</div>
                                    <div class="text-gray-500 font-medium text-lg">No hay jugadores registrados</div>
                                    <p class="text-sm text-gray-400 mt-1">Comienza agregando un nuevo deportista a la liga.</p>
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