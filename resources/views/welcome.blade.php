@extends('layouts.app')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Título con degradado -->
        <h1 class="text-4xl font-extrabold mb-2 text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
            🏀 Dashboard - Liga de Básquetbol
        </h1>
        <p class="text-gray-600 mb-8 font-medium">Bienvenido, {{ auth()->user()->name ?? 'Usuario' }}</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Tarjetas con animación al pasar el ratón -->
            <a href="{{ route('teams.index') }}" class="block bg-white p-8 rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 text-center border-t-4 border-indigo-500">
                <div class="text-6xl mb-4">🏀</div>
                <h3 class="text-2xl font-semibold text-gray-800">Equipos</h3>
                <p class="text-5xl font-bold text-indigo-600 mt-2">{{ \App\Models\Team::count() ?? 0 }}</p>
            </a>
            <a href="{{ route('players.index') }}" class="block bg-white p-8 rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 text-center border-t-4 border-green-500">
                <div class="text-6xl mb-4">👟</div>
                <h3 class="text-2xl font-semibold text-gray-800">Jugadores</h3>
                <p class="text-5xl font-bold text-green-600 mt-2">{{ \App\Models\Player::count() ?? 0 }}</p>
            </a>
            <a href="{{ route('games.index') }}" class="block bg-white p-8 rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 text-center border-t-4 border-purple-500">
                <div class="text-6xl mb-4">🏆</div>
                <h3 class="text-2xl font-semibold text-gray-800">Partidos</h3>
                <p class="text-5xl font-bold text-purple-600 mt-2">{{ \App\Models\Game::count() ?? 0 }}</p>
            </a>
        </div>

        <!-- Botones centrados y adaptables a móviles -->
        <div class="mt-12 flex flex-wrap justify-center gap-4">
            <a href="{{ route('teams.index') }}" class="bg-indigo-600 text-white px-8 py-4 rounded-xl text-lg font-medium hover:bg-indigo-700 shadow-lg hover:shadow-xl transition-all">
                Ir a Equipos
            </a>
            <a href="{{ route('players.index') }}" class="bg-green-600 text-white px-8 py-4 rounded-xl text-lg font-medium hover:bg-green-700 shadow-lg hover:shadow-xl transition-all">
                Ir a Jugadores
            </a>
            <a href="{{ route('games.index') }}" class="bg-purple-600 text-white px-8 py-4 rounded-xl text-lg font-medium hover:bg-purple-700 shadow-lg hover:shadow-xl transition-all">
                Ir a Partidos
            </a>
        </div>
        
    </div>
</div>
@endsection